<?php

namespace App\Http\Controllers\Guru;

use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Ujian;
use App\Models\ThAkademik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    public function index()
    {
        // $ujians = Ujian::orderBy('tgl_ujian')->get();
        // $kelass = Kelas::orderBy('nama_kelas', 'ASC')->get();
        // $th_akademiks = ThAkademik::orderBy('th_akademik', 'ASC')->get();
        // $soals = Soal::orderBy('soal')->get();
        // dd($kelass);
        return view("Guru.soal");
    }
    public function uploadSoal(Request $request)
    {
        // dd($request);
        Excel::import(new SoalImport, $request->file);

        return redirect()->back()->with('success', 'soal Imported Successfully');
    }
}
