<?php

namespace App\Http\Controllers\Guru;

use App\Exports\SoalExport;
use App\Models\Guru;
use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ujian;
use App\Models\Jawaban;
use App\Models\Jenjang;
use App\Models\ThAkademik;
use App\Imports\SoalImport;
use App\Models\detail_soal;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\mst_mapel_guru_kelas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;

class SoalController extends Controller
{
    public function index($id_mapels)
    {
        $id_mapels= $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();

        $header_ujians = HeaderUjian::where('id_gurus', $guru->id)->get();

        $jenjang = Jenjang::whereHas('mst_mapel_guru_kelas', function ($query) {
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();
            return $query->where('id_gurus', $guru->id);
        })->get();

        $detail_ujian = DetailUjian::all();

        return view("Guru.soal", compact('jenjang', 'header_ujians', 'detail_ujian', 'id_mapels'));
    }

    public function uploadSoal(Request $request, $id_header_ujians)
    {
        Excel::import(new SoalImport($id_header_ujians), $request->file);

        return redirect()->back()->with('success', 'soal Imported Successfully');
    }

    public function exportSoal($id_header_ujians)
    {
        return Excel::download(new SoalExport($id_header_ujians), 'soal.xlsx');
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

    public function edit_soal($id_mapels, $id_header_ujians)
    {
        $id_mapels = $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $header_ujians = HeaderUjian::where('id', $id_header_ujians)->first();

        $soal = Soal::where('id_headerujian', $id_header_ujians)->get();
        $jawaban = Jawaban::all();

        return view("Guru.edit_soal", compact('header_ujians', 'soal', 'jawaban', 'id_mapels'));
    }

    public function update_soal(Request $request, $id_soal)
    {
        $jawaban = Jawaban::where('id_soals', $id_soal)->get();
        Soal::where('id', $id_soal)->update([
            'soal' => $request->soaltext
        ]);
        foreach ($jawaban as $jwb) {
            if ($request->status == $jwb->id) {
                $status = 1;
            } else {
                $status = 0;
            }
            Jawaban::where('id', $jwb->id)->update([
                'jawaban' => $request->jawaban[$jwb->id],
                'status'  => $status
            ]);
        }
        return redirect()->back();
    }

    public function delete_soal($id_header_ujians)
    {
        $id_soals = Soal::where('id_headerujian', $id_header_ujians)->get();
        foreach ($id_soals as $idsl) {
            DB::table('jawabans')->where('id_soals', $idsl->id)->delete();
        }
        DB::table('soals')->where('id_headerujian', $id_header_ujians)->delete();
        return redirect()->back();
    }
}
