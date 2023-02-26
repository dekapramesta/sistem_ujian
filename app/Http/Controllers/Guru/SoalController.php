<?php

namespace App\Http\Controllers\Guru;

use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Ujian;
use App\Models\ThAkademik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\SoalImport;
use App\Models\detail_soal;
use App\Models\Guru;
use App\Models\Jenjang;
use App\Models\Mapel;
use App\Models\mst_mapel_guru_kelas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $mst = mst_mapel_guru_kelas::where('id_gurus', $guru->id)->with('kelas', 'mapel', 'jenjang')->get();
        $jenjang = Jenjang::whereHas('mst_mapel_guru_kelas', function ($query) {
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();
            return $query->where('id_gurus', $guru->id);
        })->get();
        $mapel = Mapel::whereHas('mst_mapel_guru_kelas', function ($query) {
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();
            return $query->where('id_gurus', $guru->id);
        })->get();
        // dd($mapel);
        // dd($mst->kelas);
        // foreach ($mst as $msts) {
        //     dd($msts->jenjang->id);
        // }
        $soal = Soal::all();

        // print_r($guru);
        // dd($mst_mapel);

        // $ujians = Ujian::orderBy('tgl_ujian')->get();
        // $kelass = Kelas::orderBy('nama_kelas', 'ASC')->get();
        // $th_akademiks = ThAkademik::orderBy('th_akademik', 'ASC')->get();
        // $soals = Soal::orderBy('soal')->get();
        // dd($kelass);
        return view("Guru.soal", compact('mst', 'soal', 'mapel', 'jenjang'));
    }
    public function uploadSoal(Request $request)
    {
        $guru = Guru::where(['id_user' => Auth::user()->id])->first()->id;
        $mst_pusat = mst_mapel_guru_kelas::where(['id_mapels' => $request->mapel, "id_jenjang" => $request->jenjang, "id_gurus" => $guru])->get();
        foreach ($mst_pusat as $mst_soal) {
            $soal = new Soal();
            $soal->id_mst_mapel_guru_kelas = $mst_soal->id;
            $soal->token = rand(10000, 99999);
            $soal->save();
            Excel::import(new SoalImport($soal->id), $request->file);
        }


        return redirect()->back()->with('success', 'soal Imported Successfully');
    }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->image->move(public_path('img'), $name);

        return redirect()->back()->with('status', 'Image Has been uploaded');
    }
}
