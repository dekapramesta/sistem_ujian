<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jenjang;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama', 'ASC')->get();
        $jenjangs = Jenjang::orderBy('nama_jenjang', 'Desc')->get();
        $classes = Kelas::orderBy('nama_kelas', 'Desc')->get();
        $jurusans = Jurusan::orderBy('nama_jurusan', 'Desc')->get();
        // dd($jenjangs);
        return view("Admin.siswa", compact('siswas', 'jenjangs', 'classes', 'jurusans'));
    }

    public function create(Request $request)
    {

        session()->flash('modal', 'create');
        $nama_jurusan = $request->nama_jurusan;
        $validator  = $request->validate([
                'nama_jurusan' => 'required',
                $nama_jurusan => 'required',
                'nama' => 'required',
                'nis' => 'required | unique:users,username',
                'tanggal_lahir' => 'required|date',
        ], [
            'nama_jurusan.required' => 'Jurusan harus dipilih.',
            $nama_jurusan.'.required' => 'Kelas harus dipilih.',
            'nama.required' => 'Nama siswa harus diisi.',
            'nis.required' => 'NIS harus diisi.',
            'nis.unique' => 'NIS sudah ada dalam database.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
        ]);
        $tanggal = substr($request->tanggal_lahir, 8, 2);
        $bulan = substr($request->tanggal_lahir, 5, 2);
        $tahun = substr($request->tanggal_lahir, 0, 4);
        $password = $tanggal.''.$bulan.''.$tahun;
        $tgl = Carbon::parse($request->tanggal_lahir)->format('d-m-Y');
        $real_tgl = str_replace("-", "", $tgl);

        $User = User::create([
            'username' => $request->nis,
            'password' => bcrypt($real_tgl),
            'jabatan' => 'siswa',
            'verified'=> 0
        ]);

        $find_user = User::where('username', $request->nis)->first();
        $nama_jurusan = $request->nama_jurusan;
        $kelas = (Kelas::find($request->$nama_jurusan));

        $Siswa = Siswa::create([
            'id_user' => $find_user->id,
            'id_kelas'=> $request->$nama_jurusan,
            'nama' => $request->nama,
            'nis' => $request->nis,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        if($Siswa) {
            return back()->with('success', 'Berhasil Tambah Data');
        } else {
            return back()->with('error', 'Gagal Tambah Data')->withInput()->withErrors($validator);
        }
    }
    public function edit(Request $request, $nis)
    {
        session()->flash('modal', 'edit');
        session()->flash('nis', $nis);
        $request->validate([
            'id_kelas_edit'=> 'required',
            'nama_edit' => 'required',
            'nis_edit' => 'required',
            'tanggal_lahir_edit' => 'required'
        ]);
        $validator  = $request->validate([
            'id_kelas_edit' => 'required',
            'nama_edit' => 'required',
            'nis_edit' => 'required | unique:users,username,'.$nis.',username',
            'tanggal_lahir_edit' => 'required|date',
    ], [
        'id_kelas_edit.required' => 'Jurusan harus dipilih.',
        'nama_edit.required' => 'Nama siswa harus diisi.',
        'nis_edit.required' => 'NIS harus diisi.',
        'nis_edit.unique' => 'NIS sudah ada dalam database.',
        'tanggal_lahir_edit.required' => 'Tanggal lahir harus diisi.',
        'tanggal_lahir_edit.date' => 'Format tanggal lahir tidak valid.',
    ]);
        $tanggal = substr($request->tanggal_lahir_edit, 8, 2);
        $bulan = substr($request->tanggal_lahir_edit, 5, 2);
        $tahun = substr($request->tanggal_lahir_edit, 0, 4);
        $password = $tanggal.''.$bulan.''.$tahun;
        $tgl = Carbon::parse($request->tanggal_lahir_edit)->format('d-m-Y');
        $real_tgl = str_replace("-", "", $tgl);
        // dd($real_tgl);
        $user = User::where('id', $request->id_user)->update([
            'username'=>$request->nis_edit,
// 'password'=>bcrypt($real_tgl)
        ]);
        $Siswa = Siswa::where('id_user', $request->id_user)->update([
            'id_kelas'=> $request->id_kelas_edit,
            'nama' => $request->nama_edit,
            'nis' => $request->nis_edit,
            'tanggal_lahir' => $request->tanggal_lahir_edit
        ]);



        if($Siswa) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data')->withInput()->withErrors($validator);
        }
    }

    public function delete(Request $request, $nis)
    {

        $Siswa = Siswa::where('nis', $nis)->delete();

        if($Siswa) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
