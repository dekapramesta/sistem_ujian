<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Models\jadwal_ujian;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\mst_mapel_guru_kelas;
use App\Models\PesertaUjian;
use App\Models\Siswa;
use App\Models\ThAkademik;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class JadwalUjian extends Controller
{
    //
    public function index()
    {
        # code...
        $header = HeaderUjian::with('jadwal_ujian.mapel')->get();
        // dd($header);
        // dd($header);
        return view('Admin.jadwal', compact('header'));
    }
    public function AddJadwalUjian()
    {

        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $tahun_akademik = ThAkademik::all();
        return view('admin.add_ujian', compact('kelas', 'siswa', 'mapel', 'tahun_akademik'));
    }
    public function postUjian(Request $request)
    {
        # code...
        foreach ($request->data as $dt) {
            $dataJdw = jadwal_ujian::with('headerujian')->where(['id_jenjangs' => $dt['id_jenjang'], 'jenis_ujian' => $request->jenis_ujian, 'id_mapels' => $request->id_mapels, "id_th_akademiks" => $request->id_th_akademiks])->first();
            $mst_mpl_guru_kls = mst_mapel_guru_kelas::where(['id_mapels' => $request->id_mapels, 'id_kelas' => $dt['id']])->first();
            $id = 0;
            $id_header = 0;
            // return response()->json($dataJdw);
            if ($dataJdw == null) {
                $jdwlujian = jadwal_ujian::create([
                    'id_jenjangs' => $dt['id_jenjang'],
                    'id_th_akademiks' => $request->id_th_akademiks,
                    'id_mapels' => $request->id_mapels,
                    'jenis_ujian' => $request->jenis_ujian,
                    "status" => 0
                ]);
                $id = $jdwlujian->id;
                $header = HeaderUjian::create([
                    'id_jadwalujian' => $id,
                    'id_gurus' => $mst_mpl_guru_kls->id_gurus,
                    'id_jenjangs' => $dt['id_jenjang'],
                    // 'st' => $request->jenis_ujian,
                    "status" => 0
                ]);
                $id_header = $header->id;
            } else {

                // return response()->json($dataJdw);
                $id = $dataJdw->id;
                $id_header = $dataJdw->headerujian[0]->id;
            }
            $searhDtl = DetailUjian::where(['id_kelas' => $dt['id'], 'id_headerujian' => $id_header])->first();
            if ($searhDtl != null) {
                continue;
            }
            $detail = DetailUjian::create([
                'id_headerujian' => $id_header,
                'id_kelas' => $dt['id'],
                'tanggal_ujian' => $request->tanggal_ujian,
                'waktu_ujian' => $request->waktu_ujian,
                'status' => 0
            ]);
            foreach ($dt['siswa'] as $sw) {
                PesertaUjian::create([
                    'nis' => $sw['nis'],
                    'id_detail_ujians' => $detail->id,
                ]);
            }
        }
        return response()->json('success');
    }
}