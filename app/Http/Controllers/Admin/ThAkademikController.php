<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThAkademik;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ThAkademikController extends Controller
{
    public function index()
    {
        $th_akademiks = ThAkademik::orderBy('th_akademik', 'ASC')->get();
        return view("admin.th_akademik", compact('th_akademiks'));
    }

    public function create(Request $request)
    {
        session()->flash('modal', 'create');
        $validator  = $request->validate([
            'th_akademik' => [
                'required',
                Rule::unique('th_akademiks')->where(function ($query) use ($request) {
                    return $query->where('nama_semester', $request->nama_semester);
                })],
            'nama_semester' => [
                'required',
                Rule::unique('th_akademiks')->where(function ($query) use ($request) {
                    return $query->where('th_akademik', $request->th_akademik);
                })
            ]
        ], [
            'th_akademik.required' => 'Tahun Akademik tidak boleh kosong',
            'th_akademik.unique' => 'Tahun Akademik sudah ada untuk Semester yang anda pilih',
            'nama_semester.required' => 'Nama Semester harus dipilih',
            'nama_semester.unique' => 'Nama Semester sudah ada untuk Tahun Akademik yang anda masukkan',
        ]);

        // $input = $request->all();

        $ThAkademik = ThAkademik::create([
            'th_akademik' => $request->th_akademik,
            'nama_semester' => $request->nama_semester,
            'identitas' => Str::random(10),
        ]);

        if($ThAkademik) {
            return back()->with('success', 'Berhasil Tambah Data');
        } else {
            return back()->with('error', 'Gagal Tambah Data')->withInput()->withErrors($validator);
        }
    }
    public function edit(Request $request, $identitas)
    {
        session()->flash('modal', 'edit');
        session()->flash('identitas', $identitas);
        $validator_edit  = $request->validate([
            'th_akademik_edit' => [
                'required',
                Rule::unique('th_akademiks', 'th_akademik')->where(function ($query) use ($request, $identitas) {
                    return $query->where('nama_semester', $request->nama_semester_edit)->where('identitas', '!=', $identitas);
                })],
            'nama_semester_edit' => [
                'required',
                Rule::unique('th_akademiks', 'nama_semester')->where(function ($query) use ($request, $identitas) {
                    return $query->where('th_akademik', $request->th_akademik)->where('identitas', '!=', $identitas);
                })
            ]
        ], [
            'th_akademik_edit.required' => 'Tahun Akademik tidak boleh kosong',
            'th_akademik_edit.unique' => 'Tahun Akademik sudah ada untuk Semester yang anda pilih',
            'nama_semester_edit.required' => 'Nama Semester harus dipilih',
            'nama_semester_edit.unique' => 'Nama Semester sudah ada untuk Tahun Akademik yang anda masukkan',
        ]);

        $ThAkademik = ThAkademik::where('identitas', $identitas)->update([
            'th_akademik' => $request->th_akademik_edit,
            'nama_semester' => $request->nama_semester_edit,
        ]);

        if($ThAkademik) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data')->withInput()->withErrors($validator_edit);
        }
    }

    public function delete(Request $request, $identitas)
    {

        $ThAkademik= ThAkademik::where('identitas', $identitas)->delete();

        if($ThAkademik) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
