<?php

namespace App\Http\Controllers\Guru;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Soal;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Jawaban;
use App\Models\HeaderUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\jadwal_ujian;
use App\Models\mst_mapel_guru_kelas;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class GuruHomeController extends Controller
{
    public function index($id_mapels)
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $id_mapels = $id_mapels;
        $nama_mapel = Mapel::where('id', $id_mapels)->first();
        $mst = mst_mapel_guru_kelas::where('id_mapels', $id_mapels)->where('id_gurus', $guru->id)->get();
        // dd($mst);
        $currentDate = Carbon::now()->toDateString();
        $ujian = HeaderUjian::with('detailujian', 'jadwal_ujian')->where('id_gurus', $guru->id)->where('status', '!=', 8)->whereHas('detailujian', function ($query) use ($currentDate) {
            return $query->whereDate('tanggal_ujian', $currentDate);
        })->get();

        return view("Guru.guru_home", compact('guru', 'id_mapels', 'nama_mapel', 'mst', 'currentDate', 'ujian'));
    }

    public function getMonitoring(Request $request)
    {
        # code...
        $monitoring = HeaderUjian::with('detailujian.pesertaujian.siswa', 'jadwal_ujian.mapel', 'detailujian.kelas.jenjang', 'detailujian.kelas.jurusan')->where('id', $request->id)->where('status', '!=', 8)->first();
        return response()->json($monitoring);
    }

    public function aktivasi()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        return view('Guru.aktivasi', compact('guru'));
    }

    public function aktivasi_guru(Request $request)
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        if($request->password == $request->konfirmasi_password) {
            $save = User::where('id', $user->id)->update([
                'password'  => bcrypt($request->password),
                'verified'  => 1
            ]);

            if($save) {
                $no_telp = substr($request->no_telp, 0, 3) === "628" ? '08'.substr($request->no_telp, 3) : $request->no_telp;
                Guru::where('id_user', $user->id)->update([
                    'no_telp' => ($no_telp),
                ]);
            }

            Alert::success('Berhasil', 'Berhasil Merubah Password dan Aktivasi');
            return redirect()->route('guru.mapel');
        } else {
            Alert::error('Gagal', 'Password Baru tidak sama dengan Konfirmasi Password Baru');
            return redirect()->back();
        }
    }

    public function mapel()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $mapel = mst_mapel_guru_kelas::select('id_mapels', 'id_gurus')->groupBy('id_mapels')->where('id_gurus', '=', $guru->id)->get();
        $mapel_all = mst_mapel_guru_kelas::all();

        return view("Guru.pilih_mapel", compact('mapel', 'guru', 'mapel_all'));
    }

    public function jadwal(Request $request)
    {
        $now = Carbon::now();
        $date = $now->toDateString(); // Mendapatkan tanggal dalam format Y-m-d (misal: 2023-05-25)
        $time = $now->toTimeString();
        $currentDate = $date . ' ' . $time;
        $ujian = HeaderUjian::with('detailujian', 'jadwal_ujian')->where('id_gurus', $request->id_gurus)->where('status', '!=', 8)->whereHas('detailujian', function ($query) use ($currentDate) {
            return $query->where('tanggal_ujian', '>', $currentDate);
        })->get();
        return response()->json(['data' => $ujian], 200);
    }
}
