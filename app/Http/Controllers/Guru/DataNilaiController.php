<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\HeaderUjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class DataNilaiController extends Controller
{
    public function index($id_mapels)
    {
        $id_mapels = $id_mapels;
        $nama_mapel = Mapel::where('id', $id_mapels)->first();

        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $header_ujians = HeaderUjian::where('id_gurus', $guru->id)->get();

        return view('Guru.data_nilai', compact('id_mapels', 'nama_mapel', 'header_ujians'));
    }

    public function hasil_cari($id_mapels, Request $request)
    {
        $request->validate([
            'id_header_ujian' => 'required',
        ]);
        $id_mapels = $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $nama_mapel = Mapel::where('id', $id_mapels)->first();
        $ujian = HeaderUjian::where('id', $request->id_header_ujian)->first();

        $nilais = Nilai::where('id_ujian', $request->id_header_ujian)->get();
        $header_ujians = HeaderUjian::where('id_gurus', $guru->id)->get();
        $detail_ujians = DetailUjian::where('id_headerujian', $request->id_header_ujian)->get();
        // dd($detail_ujians);

        return view('Guru.hasil_cari_nilai', compact('id_mapels', 'nama_mapel', 'ujian', 'nilais', 'header_ujians', 'detail_ujians'));
    }
}
