<?php

namespace App\Http\Controllers\Guru;

use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Ujian;
use App\Models\ThAkademik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoalController extends Controller
{
    public function index()
    {
        $ujians = Ujian::orderBy('tgl_ujian')->get();
        $kelass = Kelas::orderBy('nama_kelas', 'ASC')->get();
        $th_akademiks = ThAkademik::orderBy('th_akademik', 'ASC')->get();
        $soals = Soal::orderBy('soal')->get();
        // dd($kelass);
        return view("Guru.soal", compact('ujians', 'kelass', 'th_akademiks', 'soals'));
    }
}
