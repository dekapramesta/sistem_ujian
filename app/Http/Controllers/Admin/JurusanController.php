<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index() {
        $jurusans = Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        return view("admin.jurusan", compact('jurusans'));
    }

    public function create(Request $request){
        $request->validate([
            'nama_jurusan' => 'required',
        ]);

        // $input = $request->all();

        $Jurusan = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'identitas' => Str::random(10),
        ]);

        if($Jurusan){
            return back()->with('success', 'Berhasil Tambah Data');
        }else{
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $identitas){
        $request->validate([
            'nama_jurusan' => 'required',
        ]);

        $Jurusan = Jurusan::where('identitas', $identitas)->update([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        if($Jurusan){
            return back()->with('success', 'Berhasil Edit Data');
        }else{
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $identitas){

        $Jurusan= Jurusan::where('identitas', $identitas)->delete();

        if($Jurusan){
            return back()->with('success', 'Berhasil Hapus Data');
        }else{
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
