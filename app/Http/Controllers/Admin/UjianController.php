<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ujian;
use App\Models\Kelas;
use App\Models\ThAkademik;
use App\Models\Soal;

class UjianController extends Controller
{
    public function index()
    {
        $ujians = Ujian::orderBy('tgl_ujian')->get();
        $kelass = Kelas::orderBy('nama_kelas', 'ASC')->get();
        $th_akademiks = ThAkademik::orderBy('th_akademik', 'ASC')->get();
        $soals = Soal::orderBy('soal')->get();
        // dd($kelas);
        return view("admin.ujian", compact('ujians', 'kelass', 'th_akademiks', 'soals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'id_th_akademik'=> 'required',
            'id_soal' => 'required',
            'jum_soal' => 'required',
            'acak_soal' => 'required',
            'tgl_ujian' => 'required',
            'jam_ujian' => 'required',
            'status_ujian' => 'required'
        ]);

        // $input = $request->all();

        $Ujian = Ujian::create([
            'id_kelas'=> $request->id_kelas,
            'id_th_akademik'=> $request->id_th_akademik,
            'id_soal'=> $request->id_soal,
            'jum_soal' => $request->jum_soal,
            'acak_soal' => $request->acak_soal,
            'tgl_ujian' => $request->tgl_ujian,
            'jam_ujian' => $request->jam_ujian,
            'status_ujian' => $request->status_ujian,
            'identitas' => Str::random(10)
        ]);

        if ($Ujian) {
            return back()->with('success', 'Berhasil Tambah Data');
        } else {
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $nis)
    {
        $request->validate([
            'id_kelas' => 'required',
            'id_th_akademik'=> 'required',
            'id_soal' => 'required',
            'jum_soal' => 'required',
            'acak_soal' => 'required',
            'tgl_ujian' => 'required',
            'jam_ujian' => 'required',
            'status_ujian' => 'required'
        ]);

        $Ujian = Ujian::where('identitas', $identitas)->update([
            'id_kelas'=> $request->id_kelas,
            'id_th_akademik'=> $request->id_th_akademik,
            'id_soal'=> $request->id_soal,
            'jum_soal' => $request->jum_soal,
            'acak_soal' => $request->acak_soal,
            'tgl_ujian' => $request->tgl_ujian,
            'jam_ujian' => $request->jam_ujian,
            'status_ujian' => $request->status_ujian
        ]);

        if ($Ujian) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $identitas)
    {
        $Ujian = Ujian::where('identitas', $identitas)->delete();

        if ($Ujian) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
