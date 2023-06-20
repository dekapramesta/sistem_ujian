<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::orderBy('nama_mapel', 'ASC')->get();
        $jurusans=Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        return view("Admin.mapel", compact('mapels', 'jurusans'));
    }

    public function create(Request $request)
    {
        session()->flash('modal', 'create');
        $validator  = $request->validate([
            'id_jurusan' => [
                'required',
                Rule::unique('mapels')->where(function ($query) use ($request) {
                    return $query->where('nama_mapel', $request->nama_mapel);
                })],
            'nama_mapel' => [
                'required',
                Rule::unique('mapels')->where(function ($query) use ($request) {
                    return $query->where('id_jurusan', $request->id_jurusan);
                })
            ]
        ], [
            'id_jurusan.required' => 'Jurusan harus dipilih',
            'id_jurusan.unique' => 'Jurusan sudah ada untuk Mapel yang anda masukkan',
            'nama_mapel.required' => 'Mapel tidak boleh kosong',
            'nama_mapel.unique' => 'Mapel sudah ada untuk Jurusan yang anda pilih',
        ]);

        $Mapel = Mapel::create([
            'id_jurusan' => $request->id_jurusan,
            'nama_mapel' => $request->nama_mapel,
            'identitas' => Str::random(10),
        ]);

        if($Mapel) {
            return back()->with('success', 'Berhasil Tambah Data');
        } else {
            return back()->with('error', 'Gagal Tambah Data')->withInput()->withErrors($validator);
        }
    }
    public function edit(Request $request, $identitas)
    {

        session()->flash('modal', 'edit');
        session()->flash('identitas', $identitas);
        $validator  = $request->validate([
            'id_jurusan_edit' => [
                'required',
                Rule::unique('mapels', 'id_jurusan')->where(function ($query) use ($request, $identitas) {
                    return $query->where('nama_mapel', $request->nama_mapel_edit)->where('identitas', '!=', $identitas);
                    ;
                })],
            'nama_mapel_edit' => [
                'required',
                Rule::unique('mapels', 'nama_mapel')->where(function ($query) use ($request, $identitas) {
                    return $query->where('id_jurusan', $request->id_jurusan_editx)->where('identitas', '!=', $identitas);
                    ;
                })
            ]
        ], [
            'id_jurusan_edit.required' => 'Jurusan harus dipilih',
            'id_jurusan_edit.unique' => 'Jurusan sudah ada untuk Mapel yang anda masukkan',
            'nama_mapel_edit.required' => 'Mapel tidak boleh kosong',
            'nama_mapel_edit.unique' => 'Mapel sudah ada untuk Jurusan yang anda pilih',
        ]);

        $Mapel = Mapel::where('identitas', $identitas)->update([
            'id_jurusan' => $request->id_jurusan_edit,
            'nama_mapel' => $request->nama_mapel_edit,
        ]);

        if($Mapel) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data')->withInput()->withErrors($validator);
        }
    }

    public function delete(Request $request, $identitas)
    {

        $Mapel= Mapel::where('identitas', $identitas)->delete();

        if($Mapel) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
