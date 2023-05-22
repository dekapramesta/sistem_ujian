<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MultipleSheetsExport;

class ProfilController extends Controller
{
    public function index()
    {
        // $id_mapels = $id_mapels;
        // $nama_mapel = Mapel::where('id', $id_mapels)->first();

        // $user = Auth::user();
        // $guru = Guru::where('id_user', $user->id)->first();
        // $header_ujians = HeaderUjian::where('id_gurus', $guru->id)->get();

        return view('Guru.profil');
    }

}
