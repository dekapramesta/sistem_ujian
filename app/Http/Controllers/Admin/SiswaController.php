<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\User;


class SiswaController extends Controller
{
    public function index() {
        $siswas = Siswa::orderBy('nama', 'ASC')->get();
        $jenjangs = Jenjang::orderBy('nama_jenjang', 'ASC')->get();
        $classes = Kelas::orderBy('nama_kelas', 'ASC')->get();
        $jurusans = Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        dd($jenjangs);
        return view("admin.siswa", compact('siswas','jenjangs', 'classes', 'jurusans'));
    }

    public function create(Request $request){
        $request->validate([
            'id_jenjang' => 'required',
            'id_kelas'=> 'required',
            'nama' => 'required',
            'nis' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $tanggal = substr($request->tanggal_lahir,8,2);
        $bulan = substr($request->tanggal_lahir,5,2);
        $tahun = substr($request->tanggal_lahir,0,4);
        $password = $tanggal.''.$bulan.''.$tahun;

        $User = User::create([
            'username' => $request->nis,
            'password' => bcrypt($password),
            'jabatan' => 'Siswa',
        ]);

        $find_user = User::where('username', $request->nis)->first();

        // $input = $request->all();

        $Siswa = Siswa::create([
            'id_user' => $find_user->id,
            'id_jenjang' => $request->id_jenjang,
            'id_kelas'=> $request->id_kelas,
            'nama' => $request->nama,
            'nis' => $request->nis,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        if($Siswa){
            return back()->with('success', 'Berhasil Tambah Data');
        }else{
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $nis){
        $request->validate([
            'id_jenjang' => 'required',
            'id_kelas'=> 'required',
            'nama' => 'required',
            'nis' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $Siswa = Siswa::where('nis', $nis)->update([
            'id_jenjang' => $request->id_jenjang,
            'id_kelas'=> $request->id_kelas,
            'nama' => $request->nama,
            'nis' => $request->nis,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        if($Siswa){
            return back()->with('success', 'Berhasil Edit Data');
        }else{
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $nis){

        $Siswa = Siswa::where('nis', $nis)->delete();

        if($Siswa){
            return back()->with('success', 'Berhasil Hapus Data');
        }else{
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
