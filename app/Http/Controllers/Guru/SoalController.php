<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ujian;
use App\Models\Jenjang;
use App\Models\ThAkademik;
use App\Imports\SoalImport;
use App\Models\detail_soal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Models\Jawaban;
use App\Models\mst_mapel_guru_kelas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class SoalController extends Controller
{
    public function index()
    {
        # New

        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();

        $header_ujians = HeaderUjian::where('id_gurus', $guru->id)->get();
        // foreach ($header_ujians as $hdr) {
        //     dd($hdr->detailujian);
        // }
        # Old
        // $mst = mst_mapel_guru_kelas::where('id_gurus', $guru->id)->with('kelas', 'mapel', 'jenjang')->get();

        $jenjang = Jenjang::whereHas('mst_mapel_guru_kelas', function ($query) {
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();
            return $query->where('id_gurus', $guru->id);
        })->get();

        $detail_ujian = DetailUjian::all();

        // $mapel = Mapel::whereHas('mst_mapel_guru_kelas', function ($query) {
        //     $user = Auth::user();
        //     $guru = Guru::where('id_user', $user->id)->first();
        //     return $query->where('id_gurus', $guru->id);
        // })->get();
        // $detail_ujian = DetailUjian::whereHas('mst_mapel_guru_kelas', function ($query) {
        //     $user = Auth::user();
        //     $guru = Guru::where('id_user', $user->id)->first();
        //     return $query->where('id_gurus', $guru->id);
        // })->get();

        return view("Guru.soal", compact('jenjang', 'header_ujians', 'detail_ujian'));
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

    public function edit_soal($id_detail_ujians)
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
        // $detail_ujian = DetailUjian::whereHas('mst_mapel_guru_kelas', function ($query) {
        //     $user = Auth::user();
        //     $guru = Guru::where('id_user', $user->id)->first();
        //     return $query->where('id_gurus', $guru->id);
        // })->get();

        $detail_ujian = DetailUjian::where('id', $id_detail_ujians)->first();
        $soal = Soal::where('id_detail_ujians', $id_detail_ujians)->get();
        $jawaban = Jawaban::all();

        return view("Guru.edit_soal", compact('mst', 'detail_ujian', 'mapel', 'jenjang', 'soal', 'jawaban'));
    }
}
