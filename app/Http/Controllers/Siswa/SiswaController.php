<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::where('id_user', Auth::user()->id)->first();
        $ujian = DetailUjian::with('headerujian.jadwal_ujian.mapel')->whereHas('siswa', function ($query) use ($data) {
            return $query->where('id', $data->id);
        })->get();
        // dd($ujian);
        return view("siswa.siswa_home", compact('ujian'));
    }
}
