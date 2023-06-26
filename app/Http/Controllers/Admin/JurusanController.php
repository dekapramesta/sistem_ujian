<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        return view("Admin.jurusan", compact('jurusans'));
    }

    public function create(Request $request)
    {
        session()->flash('modal', 'create');
        $validator = $request->validate([
            'nama_jurusan' => 'required|unique:jurusans,nama_jurusan',
        ], [
            'nama_jurusan.required' => 'Nama Jurusan harus diisi.',
            'nama_jurusan.unique' => 'Nama Jurusan sudah ada dalam database.',
        ]);

        $Jurusan = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'identitas' => Str::random(10),
        ]);

        if($Jurusan) {
            return back()->with('success', 'Berhasil Tambah Data');
        } else {
            return back()->with('error', 'Gagal Tambah Data')->withInput()->withErrors($validator);
        }
    }
    public function edit(Request $request, $identitas)
    {
        session()->flash('modal', 'edit');
        session()->flash('identitas', $identitas);
        $validator = $request->validate([
            'nama_jurusan_edit' => 'required|unique:jurusans,nama_jurusan,'.$identitas.',identitas',
        ], [
            'nama_jurusan_edit.required' => 'Nama Jurusan harus diisi.',
            'nama_jurusan_edit.unique' => 'Nama Jurusan sudah ada dalam database.',
        ]);

        $Jurusan = Jurusan::where('identitas', $identitas)->update([
            'nama_jurusan' => $request->nama_jurusan_edit,
        ]);

        if($Jurusan) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data')->withInput()->withErrors($validator);
        }
    }

    public function delete(Request $request, $identitas)
    {

        $Jurusan= Jurusan::where('identitas', $identitas)->delete();

        if($Jurusan) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
