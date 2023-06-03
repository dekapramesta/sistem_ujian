<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Jenjang;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\mst_mapel_guru_kelas;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MultipleSheetsExport;

class DataNilaiController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        $mst_mapel_guru_kelas = mst_mapel_guru_kelas::all();
        $jenjang = Jenjang::all();
        return view('Admin.data_nilai', compact('mapel', 'mst_mapel_guru_kelas', 'jenjang'));
    }

    public function hasil_cari(Request $request)
    {
        $mapel = Mapel::all();
        $mst_mapel_guru_kelas = mst_mapel_guru_kelas::all();
        $jenjang = Jenjang::all();

        $mapel_hasil = Mapel::where('id', $request->id_mapel)->first();
        $ujian = HeaderUjian::where('id', $request->id_header_ujian)->first();
        $detail_ujians = DetailUjian::where('id_headerujian', $request->id_header_ujian)->get();
        $nilais = Nilai::where('id_ujian', $request->id_header_ujian)->get();

        return view('Admin.hasil_cari_nilai', compact('mapel', 'mst_mapel_guru_kelas', 'jenjang', 'mapel_hasil', 'ujian', 'detail_ujians', 'nilais'));
    }

    public function exportNilai($id_header_ujian)
    {
        $detail_ujians = DetailUjian::where('id_headerujian', $id_header_ujian)->get();

        $header_ujians = HeaderUjian::where('id', $id_header_ujian)->first();

        $judul = $header_ujians->jadwal_ujian->mapel->nama_mapel . ' - Kelas ' .
        $header_ujians->jenjang->nama_jenjang . ' - '.
        $header_ujians->jadwal_ujian->jenis_ujian . ' - ' .
        $header_ujians->jadwal_ujian->th_akademiks->th_akademik . ' - Semester ' .
        $header_ujians->jadwal_ujian->th_akademiks->nama_semester;
        $judul = str_replace('/', '-', $judul);

        $sheetsData = [];

        foreach ($detail_ujians as $dtluj) {
            $sheetsData[] = [
                'title' => $dtluj->kelas->jurusan->nama_jurusan . ' - ' . $dtluj->kelas->nama_kelas,
                'data' => Nilai::with('siswa')->whereHas('siswa', function ($query) use ($dtluj) {
                    return $query->where('id_kelas', $dtluj->id_kelas);
                })->get(),
            ];
        }
        return Excel::download(new MultipleSheetsExport($sheetsData), 'Nilai '.$judul.'.xlsx');

    }

    public function contoh()
    {
        $arr_soal = [1,2,3,4,5,6];

        for ($i = count($arr_soal) - 1; $i > 0; $i--) { // => $i=5
            $r = rand(0, $i);  // random angka 0 - jumlah soal yang diupload => $r=3
            $tmp = $arr_soal[$i]; // mengambil soal data terakhir            => range data soal ke-5 =siapa sukarno
            $arr_soal[$i] = $arr_soal[$r]; //Tukar posisi (x) dengan data terakhir range 1 sampai dengan i  =>data soal 5 = data soal 3; data soal 5 = siapa megawati
            $arr_soal[$r] = $tmp; //Tukar posisi (x) dengan data terakhir range 1 sampai dengan i => data soal 3 = siapa sukarno
        }

        dd($arr_soal);
    }
}
