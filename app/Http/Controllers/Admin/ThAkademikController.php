<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ThAkademik;

class ThAkademikController extends Controller
{
    public function index() {
        $th_akademiks = ThAkademik::orderBy('th_akademik', 'ASC')->get();
        return view("admin.th_akademik", compact('th_akademiks'));
    }

    public function create(Request $request){
        $request->validate([
            'th_akademik' => 'required',
            'nama_semester' => 'required',
        ]);

        // $input = $request->all();

        $ThAkademik = ThAkademik::create([
            'th_akademik' => $request->th_akademik,
            'nama_semester' => $request->nama_semester,
            'identitas' => Str::random(10),
        ]);

        if($ThAkademik){
            return back()->with('success', 'Berhasil Tambah Data');
        }else{
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $identitas){
        $request->validate([
            'th_akademik' => 'required',
            'nama_semester' => 'required',
        ]);

        $ThAkademik = ThAkademik::where('identitas', $identitas)->update([
            'th_akademik' => $request->th_akademik,
            'nama_semester' => $request->nama_semester,
        ]);

        if($ThAkademik){
            return back()->with('success', 'Berhasil Edit Data');
        }else{
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $identitas){

        $ThAkademik= ThAkademik::where('identitas', $identitas)->delete();

        if($ThAkademik){
            return back()->with('success', 'Berhasil Hapus Data');
        }else{
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
