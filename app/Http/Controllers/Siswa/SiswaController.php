<?php

namespace App\Http\Controllers\Siswa;

use DateTime;
use App\Models\Soal;
use App\Models\Temp;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use GuzzleHttp\Psr7\Header;
use App\Models\PesertaUjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('id_user', Auth::user()->id)->first();
        $ujian = PesertaUjian::where('nis', $siswa->nis)->get();
        $nilai = Nilai::where('id_siswa', $siswa->id)->get();
        // $ujian = PesertaUjian::with('detailujian.headerujian.jadwal_ujian.mapel')->whereHas('peserta', function ($query) use ($data) {
        //     return $query->where('id', $data->id);
        // })->get();
        // dd($ujian);

        // dd($ujian);
        return view("Siswa.siswa_home", compact('ujian', 'nilai', 'siswa'));
    }

    public function aktivasi()
    {
        $user = Auth::user();
        $siswa = Siswa::where('id_user', $user->id)->first();
        return view('Siswa.aktivasi', compact('siswa'));
    }

    public function aktivasi_siswa(Request $request)
    {
        $user = Auth::user();
        $siswa = Siswa::where('id_user', $user->id)->first();
        // dd(substr($request->no_telp, 0, 3) === "628");
        if ($request->password == $request->konfirmasi_password) {
            $save = User::where('id', $user->id)->update([
                'password'  => bcrypt($request->password),
                'verified'  => 1
            ]);

            if ($save) {
                $no_telp = substr($request->no_telp, 0, 3) === "628" ? '08' . substr($request->no_telp, 3) : $request->no_telp;
                Siswa::where('id_user', $user->id)->update([
                    'no_telp' => ($no_telp),
                ]);
            }


            Alert::success('Berhasil', 'Berhasil Merubah Password dan Aktivasi');
            return redirect()->route('siswa.dashboard');
        } else {
            Alert::error('Gagal', 'Password Baru tidak sama dengan Konfirmasi Password Baru');
            return redirect()->back();
        }
    }

    public function ujian()
    {
        # code...

        return view("Siswa.ujian");
    }

    public function getTemp(Request $request)
    {
        # code...
        $ujian = Soal::with('jawaban')->where('id_headerujian', $request->id)->get();
        // return response()->json(['data' => $ujian], 200);
        $header_ujian = HeaderUjian::with('jadwal_ujian.mapel', 'jadwal_ujian.th_akademiks', 'jenjang')->where('id', $request->id)->first();
        $siswa = Siswa::with('kelas.jurusan', 'kelas.jenjang')->where('id_user', Auth::user()->id)->first();
        $temp = Temp::where([['id_headerujian', $ujian[0]->id_headerujian], ['id_siswa', $siswa->id]])->get();

        if ($temp->isEmpty()) {
            $detail_ujian = DetailUjian::with('headerujian')->where([['id_headerujian', '=', $request->id], ['id_kelas', '=', $siswa->id_kelas]])->first();
            $pesertaujian = PesertaUjian::where([['id_detail_ujians', '=', $detail_ujian->id], ['nis', '=', $siswa->nis]])->first();
            $pesertaujian->status = 7;
            $pesertaujian->save();
            $this->shuffleFisher(new Request(['data_ujian' => $ujian, 'siswa' => $siswa, 'total' => $ujian[0]->headerujian->jumlah_soal]));
            $temp = Temp::where([['id_headerujian', $ujian[0]->id_headerujian], ['id_siswa', $siswa->id]])->get();
        }
        return response()->json(['data' => $temp, 'ujian' => $header_ujian, 'siswa' => $siswa], 200);
    }
    public function getTime(Request $request)
    {
        # code...
        $ujian = DetailUjian::where('id_headerujian', $request->id)->first();
        // return response()->json(['data' => $ujian], 200);
        $endTime = date('M d,Y H:i:s', strtotime('+' . $ujian->waktu_ujian . 'minutes', strtotime($ujian->tanggal_ujian))); // +400minutes 2023-06-09 14:21:20
        // $endTime = date("H:i:s", strtotime('+30 minutes', $ujian->tanggal_ujian));
        $currentTime = date('Y:m:d H:i:s', time());
        $first  = new DateTime($currentTime);
        $second = new DateTime($endTime);

        $diff = $first->diff($second);
        $time_gap = $diff->format('%H:%I:%S'); // 02:00:00
        $milliseconds = strtotime($time_gap) * 1000;
        return response()->json(['time' => $milliseconds, 'jam' => $time_gap, 'end_time' => $endTime, 'waktu_ujian' => $ujian->waktu_ujian], 200);
    }
    public function getSoal(Request $request)
    {
        # code...

        $data = Temp::with('soal.jawaban')->where('id', $request->id)->first();
        return response()->json(['data' => $data], 200);
    }
    public function shuffleFisher(Request $request)
    {
        # code...
        $arr_soal = $request->data_ujian;   // soal 3 = siapa megawati
        // soal 5 = siapa sukarno

        for ($i = count($arr_soal) - 1; $i > 0; $i--) { // => $i=5
            $r = rand(0, $i);  // random angka 0 - jumlah soal yang diupload => $r=3
            $tmp = $arr_soal[$i]; // mengambil soal data terakhir            => range data soal ke-5 =siapa sukarno
            $arr_soal[$i] = $arr_soal[$r]; //Tukar posisi (x) dengan data terakhir range 1 sampai dengan i  =>data soal 5 = data soal 3; data soal 5 = siapa megawati
            $arr_soal[$r] = $tmp; //Tukar posisi (x) dengan data terakhir range 1 sampai dengan i => data soal 3 = siapa sukarno
        }

        for ($ind = 0; $ind < $request->total; $ind++) {
            Temp::create([
                'id_headerujian' => $arr_soal[$ind]->id_headerujian,
                'id_soals' => $arr_soal[$ind]->id,
                'id_siswa' => $request->siswa->id
            ]);
        }
    }

    public function postJawaban(Request $request)
    {
        # code...
        $temp = Temp::find($request->id_temp);
        $temp->id_jawaban = $request->id_jawaban;
        $temp->save();
        return response()->json(['msg' => "success"], 201);
    }

    public function ujianEnd(Request $request)
    {
        # code...
        $siswa = Siswa::where('id_user', Auth::user()->id)->first();
        $temp = Temp::with('jawaban')->where([['id_siswa', '=', $siswa->id], ['id_headerujian', '=', $request->headerujian]])->get();
        $jawaban = [];
        $jawaban_benar = 0;
        $jawaban_salah = 0;
        $detail_ujian = DetailUjian::with('headerujian')->where([['id_headerujian', '=', $request->headerujian], ['id_kelas', '=', $siswa->id_kelas]])->first();
        foreach ($temp as $tmp) {
            array_push($jawaban, $tmp->jawaban);
            if ($tmp->id_jawaban != null) {

                if ($tmp->jawaban->status == true) {
                    $jawaban_benar += 1;
                } else {
                    $jawaban_salah += 1;
                }
            } else {
                $jawaban_salah += 1;
            }
        }
        $nilai = ($jawaban_benar / $detail_ujian->headerujian->jumlah_soal) * 100;
        $searchNilai = Nilai::where('id_siswa', $siswa->id)->where('id_ujian', $request->headerujian)->first();
        $searchNilai->nilai = round($nilai, 2);
        $searchNilai->jumlah_benar = $jawaban_benar;
        $searchNilai->jumlah_salah = $jawaban_salah;
        $searchNilai->save();

        // Nilai::create([
        //     'id_ujian' => $request->headerujian,
        //     'id_siswa' => $siswa->id,
        //     'jumlah_benar' => $jawaban_benar,
        //     'jumlah_salah' => $jawaban_salah,
        //     'nilai' => round($nilai, 2),
        //     'identitas' => $siswa->nis
        // ]);
        $pesertaujian = PesertaUjian::where([['id_detail_ujians', '=', $detail_ujian->id], ['nis', '=', $siswa->nis]])->first();
        $pesertaujian->status = 1;
        $pesertaujian->save();
        return redirect()->route('ujian.preview', ['id' => $request->headerujian]);
        // dd($jawaban);
    }
    public function slicing()
    {
        return view('Siswa.slicing');
    }
    public function slicing_fix()
    {
        return view('Siswa.slicing_fix');
    }
    public function previewUjian($param)
    {
        # code...
        // dd(Auth::user()->id);
        $siswa = Siswa::with('temp.soal', 'temp.jawaban', 'nilai.headerujian.detailujian', 'nilai.headerujian.jadwal_ujian', 'kelas')
            ->where('id_user', Auth::user()->id)
            ->whereHas('temp', function ($query) use ($param) {
                $query->where('id_headerujian', $param);
            })
            ->whereHas('nilai', function ($query) use ($param) {
                $query->whereHas('headerujian', function ($subQ) use ($param) {
                    $subQ->whereHas('detailujian', function ($subQ2) use ($param) {
                        $subQ2->whereColumn('detail_ujians.id_kelas', 'siswas.id_kelas');
                    });
                });
            })
            ->first();

        // dd($siswa);
        return view('Siswa.preview', compact('siswa'));
    }
}
