<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Jenjang;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::orderBy('nama_kelas', 'ASC')->get();
        $jurusans=Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        $jenjangs=Jenjang::orderBy('nama_jenjang', 'desc')->get();
        // dd($kelas->jenjang);
        return view("admin.kelas", compact('kelas', 'jenjangs', 'jurusans'));
    }

    public function create(Request $request){
        $request->validate([
            'id_jurusan' => 'required',
            'id_jenjang' => 'required',
            'nama_kelas' => 'required',
        ]);

        // $input = $request->all();

        $Kelas = Kelas::create([
            'id_jurusan' => $request->id_jurusan,
            'id_jenjang' => $request->id_jenjang,
            'nama_kelas' => $request->nama_kelas,
            'identitas' => Str::random(10),
        ]);

        if($Kelas){
            return back()->with('success', 'Berhasil Tambah Data');
        }else{
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $identitas){
        $request->validate([
            'id_jurusan' => 'required',
            'id_jenjang' => 'required',
            'nama_kelas' => 'required',
        ]);

        // dd($request);

        $Kelas = Kelas::where('identitas', $identitas)->update([
            'id_jurusan' => $request->id_jurusan,
            'id_jenjang' => $request->id_jenjang,
            'nama_kelas' => $request->nama_kelas,
        ]);

        if($Kelas){
            return back()->with('success', 'Berhasil Edit Data');
        }else{
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $identitas){

        $Kelas= Kelas::where('identitas', $identitas)->delete();

        if($Kelas){
            return back()->with('success', 'Berhasil Hapus Data');
        }else{
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
