<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now()->toDateString();
        // $detailujian = DetailUjian::whereDate('tanggal_ujian', $currentDate)->get();

        $ujian = HeaderUjian::with('detailujian')->where('status', '!=', 8)->whereHas('detailujian', function ($query) use ($currentDate) {
            return $query->whereDate('tanggal_ujian', $currentDate);
        })->get();
        return view("Admin.admin_home", compact('ujian'));
    }
    public function getMonitoring(Request $request)
    {
        # code...
        $monitoring = HeaderUjian::with('detailujian.pesertaujian.siswa', 'jadwal_ujian.mapel', 'detailujian.kelas.jenjang', 'detailujian.kelas.jurusan')->where('id', $request->id)->first();
        return response()->json($monitoring);
    }
}
