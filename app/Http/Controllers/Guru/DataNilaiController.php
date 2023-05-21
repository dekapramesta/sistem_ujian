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
        $id_header_ujian = $request->id_header_ujian;

        return view('Guru.hasil_cari_nilai', compact('id_mapels', 'nama_mapel', 'ujian', 'nilais', 'header_ujians', 'detail_ujians', 'id_header_ujian'));
    }

    public function exportNilai($id_header_ujian)
    {
        $detail_ujians = DetailUjian::where('id_headerujian', $id_header_ujian)->get();
        $nilais = Nilai::where('id_ujian', $id_header_ujian)->get();

        $header_ujians = HeaderUjian::where('id', $id_header_ujian)->first();

        $judul = $header_ujians->jadwal_ujian->mapel->nama_mapel . ' - ' .
        $header_ujians->jadwal_ujian->jenis_ujian . ' - ' .
        $header_ujians->jadwal_ujian->th_akademiks->th_akademik . ' - Semester ' .
        $header_ujians->jadwal_ujian->th_akademiks->nama_semester;
        $judul = str_replace('/', '-', $judul);

        $sheetsData = [];

        foreach ($detail_ujians as $dtluj) {
            $nilais =Nilai::with('siswa')->whereHas('siswa', function ($query) use ($dtluj) {
                return $query->where('id_kelas', $dtluj->id_kelas);
            })->get();
            $sheetsData[] = [
                'title' => $dtluj->kelas->jurusan->nama_jurusan . ' - ' . $dtluj->kelas->nama_kelas,
                'data' => $nilais,
            ];
        }
        return Excel::download(new MultipleSheetsExport($sheetsData), 'Nilai '.$judul.'.xlsx');
    }
}
