<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jenjang;
use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('siswa')->orderBy('nama_kelas', 'ASC')->get();
        $siswa = Siswa::all();
        $jurusans = Jurusan::orderBy('nama_jurusan', 'ASC')->get();
        $jenjangs = Jenjang::orderBy('nama_jenjang', 'ASC')->get();
        return view("admin.kelas", compact('kelas', 'jenjangs', 'jurusans', 'siswa'));
    }

    public function create(Request $request)
    {
        session()->flash('modal', 'create');    // mengatur flash data dalam sesi, yaitu data yang hanya tersedia dalam satu permintaan berikutnya
        $validator = $request->validate([       // hasil dari validasi data
            'id_jenjang' => 'required',
            'id_jurusan' => 'required',
            'nama_kelas' => [
                'required',
                Rule::unique('kelas')->where(function ($query) use ($request) {
                    return $query->where('id_jenjang', $request->id_jenjang)
                                 ->where('id_jurusan', $request->id_jurusan);
                }),
            ],
        ], [
            'id_jenjang.required' => 'Jenjang harus dipilih.',
            'id_jurusan.required' => 'Jurusan harus dipilih.',
            'nama_kelas.required' => 'Nama Kelas harus diisi.',
            'nama_kelas.unique' => 'Nama Kelas sudah ada pada Jenjang dan Jurusan yang dipilih.',
        ]);

        $Kelas = Kelas::create([
            'id_jurusan' => $request->id_jurusan,
            'id_jenjang' => $request->id_jenjang,
            'nama_kelas' => $request->nama_kelas,
            'identitas' => Str::random(10),
        ]);

        if ($Kelas) {
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
            'id_jenjang_edit' => 'required',
            'id_jurusan_edit' => 'required',
            'nama_kelas_edit' => [
                'required',
                Rule::unique('kelas', 'nama_kelas')->where(function ($query) use ($request, $identitas) {
                    return $query->where('id_jenjang', $request->id_jenjang_edit)
                                 ->where('id_jurusan', $request->id_jurusan_edit)
                                 ->where('identitas', '!=', $identitas);
                }),
            ],
        ], [
            'id_jenjang_edit.required' => 'Jenjang harus dipilih.',
            'id_jurusan_edit.required' => 'Jurusan harus dipilih.',
            'nama_kelas_edit.required' => 'Nama Kelas harus diisi.',
            'nama_kelas_edit.unique' => 'Nama Kelas sudah ada pada Jenjang dan Jurusan yang dipilih.',
        ]);


        $Kelas = Kelas::where('identitas', $identitas)->update([
            'id_jurusan' => $request->id_jurusan_edit,
            'id_jenjang' => $request->id_jenjang_edit,
            'nama_kelas' => $request->nama_kelas_edit,
        ]);

        if ($Kelas) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data')->withInput()->withErrors($validator);
        }
    }

    public function delete(Request $request, $identitas)
    {

        $Kelas = Kelas::where('identitas', $identitas)->delete();

        if ($Kelas) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
    public function updateSiswa(Request $request)
    {
        # code...
        foreach ($request->siswa as $siswa) {
            $siswaUp = Siswa::find($siswa);
            $siswaUp->id_kelas = $request->kelas;
            $siswaUp->save();
        }
        return back()->with('success', 'Berhasil Edit Data');
    }
}
