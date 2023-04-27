<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\HeaderUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\mst_mapel_guru_kelas;
use Illuminate\Support\Facades\Auth;

class GuruHomeController extends Controller
{
    public function index($id_mapels)
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $id_mapels = $id_mapels;
        $nama_mapel = Mapel::where('id', $id_mapels)->first();
        $mst = mst_mapel_guru_kelas::where('id_mapels', $id_mapels)->where('id_gurus', $guru->id)->get();
        // dd($mst);

        return view("Guru.guru_home", compact('guru', 'id_mapels', 'nama_mapel', 'mst'));
    }

    public function mapel()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $mapel = mst_mapel_guru_kelas::select('id_mapels', 'id_gurus')->groupBy('id_mapels')->where('id_gurus', '=', $guru->id)->get();
        $mapel_all = mst_mapel_guru_kelas::all();

        return view("Guru.pilih_mapel", compact('mapel', 'guru', 'mapel_all'));
    }
}
