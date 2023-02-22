<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Mapel;
use App\Models\Jurusan;

class MapelController extends Controller
{
    public function index() {
        $mapels = Mapel::orderBy('nama_mapel', 'ASC')->get();
        $jurusans=Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        return view("admin.mapel", compact('mapels', 'jurusans'));
    }

    public function create(Request $request){
        $request->validate([
            'id_jurusan' => 'required',
            'nama_mapel' => 'required',
        ]);

        // $input = $request->all();

        $Mapel = Mapel::create([
            'id_jurusan' => $request->id_jurusan,
            'nama_mapel' => $request->nama_mapel,
            'identitas' => Str::random(10),
        ]);

        if($Mapel){
            return back()->with('success', 'Berhasil Tambah Data');
        }else{
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $identitas){
        $request->validate([
            'id_jurusan' => 'required',
            'nama_mapel' => 'required',
        ]);

        $Mapel = Mapel::where('identitas', $identitas)->update([
            'id_jurusan' => $request->id_jurusan,
            'nama_mapel' => $request->nama_mapel,
        ]);

        if($Mapel){
            return back()->with('success', 'Berhasil Edit Data');
        }else{
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $identitas){

        $Mapel= Mapel::where('identitas', $identitas)->delete();

        if($Mapel){
            return back()->with('success', 'Berhasil Hapus Data');
        }else{
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
