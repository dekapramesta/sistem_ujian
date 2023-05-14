<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\JadwalUjian;
use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Models\jadwal_ujian;
use App\Models\Kelas;
use App\Models\mst_mapel_guru_kelas;
use App\Models\PesertaUjian;
use App\Models\Siswa;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;

class AdminApi extends Controller
{
    //
    private $id_kelas;
    private $id_siswa;
    public function getSiswa(Request $request)
    {
        $this->id_siswa = $request->id;
        $siswa = Kelas::with('siswa')->whereHas('siswa', function ($query) {
            return $query->whereIn('id', $this->id_siswa);
        })->get();
        return response()->json($siswa);
    }
    public function getKelas(Request $request)
    {
        $kelas_jenjang = Kelas::where('id_jenjang', $request->kelas)->get()->toArray();
        $array_kelas = array_column($kelas_jenjang, 'id');

        $kelas = mst_mapel_guru_kelas::with('kelas.jurusan')->where('id_mapels', $request->id)->where(function ($query) use ($array_kelas) {
            $query->whereIn('id_kelas', $array_kelas);
        })->groupBy('id_kelas')->get();
        return response()->json($kelas, 200);
    }
    // public function getKelasWithSiswa(Request $request)
    // {

    //     $siswa = Siswa::with('siswaone', 'jurusan')->whereHas('siswaone', function ($query) use ($request) {
    //         return $query->where('id', $request->id);
    //     })->get();
    //     return response()->json($siswa);
    // }
    public function getSiswaMapel(Request $request)
    {
        $kelas_jenjang = Kelas::where('id_jenjang', $request->kelas)->get()->toArray();
        $array_kelas = array_column($kelas_jenjang, 'id');

        $kelas = mst_mapel_guru_kelas::with('kelas.jurusan', 'kelas.siswa')->where('id_mapels', $request->id)->where(function ($query) use ($array_kelas) {
            $query->whereIn('id_kelas', $array_kelas);
        })->groupBy('id_kelas')->get();
        return response()->json($kelas, 200);
    }
    public function getSiswaByKelas(Request $request)
    {
        $this->id_kelas = $request->id;
        $siswa = Kelas::with('siswa', 'jurusan')->whereHas('siswa', function ($query) {
            return $query->whereIn('id_kelas', $this->id_kelas);
        })->get();
        return response()->json($siswa);
    }

    public function getSiswaById(Request $request)
    {
        # code...
        $siswa = Siswa::with('kelas.jurusan')->select('*')->whereIn('id', $request->id)->get();
        return response()->json($siswa);
    }

    public function editJadwal(Request $request)
    {
        # code...
        $result = [];
        $nis = [];
        $data = jadwal_ujian::with('headerujian.detailujian.pesertaujian', 'mapel', 'th_akademiks')->where('id', $request->id)->first();
        foreach ($data->headerujian as $hdr) {
            foreach ($hdr->detailujian as $key => $dtl) {
                array_push($result, Kelas::with('jurusan')->where('id', $dtl->id_kelas)->first());
                $result[$key]['siswa'] = array();
                foreach ($dtl->pesertaujian  as $pst_ind => $pst) {
                    array_push($nis, Siswa::where('nis', $pst->nis)->first());
                }
                $result[$key]['siswa'] = $nis;
                $nis = [];
            }
        }

        return response()->json(['data' => $data, 'result' => $result, 'nis' => $nis]);
    }

    public function postUjianEd(Request $request)
    {
        # code...


        $notDeletCheck = 0;

        $gurus = [];
        $id_header = 0;
        $id = 0;


        foreach ($request->data as $dt) {

            $id = $request->id_jadwal;
            $mst_mpl_guru_kls = mst_mapel_guru_kelas::where(['id_mapels' => $request->id_mapels, 'id_kelas' => $dt['id']])->first();

            // return response()->json($dataJdw);


            $header = HeaderUjian::where(['id_jadwalujian' => $id, 'id_gurus' => $mst_mpl_guru_kls->id_gurus, 'id_jenjangs' => $dt['id_jenjang']])->first();
            // return response()->json($header);



            if (empty($header)) {

                if (!in_array($mst_mpl_guru_kls->id_gurus, $gurus)) {
                    $header = HeaderUjian::create([
                        'id_jadwalujian' => $id,
                        'id_gurus' => $mst_mpl_guru_kls->id_gurus,
                        'id_jenjangs' => $dt['id_jenjang'],
                        'jumlah_soal' => $request->jumlah_soal,
                        "status" => 0
                    ]);
                    // return response()->json($dataJdw);
                    $id_header = $header->id;
                    array_push($gurus, $mst_mpl_guru_kls->id_gurus);
                }
                // return response()->json("oi");
            } else {

                $header->jumlah_soal = $request->jumlah_soal;
                $header->save();
                $id_header = $header->id;
                // return response()->json("oi");
            }



            // $searhDtl = DetailUjian::where([['id_kelas', '=', $dt['id']], ['id_headerujian', '=', $id_header]])->first();
            // if ($searhDtl != null) {
            //     continue;
            // }

            if ($notDeletCheck == 0) {
                DetailUjian::where('id_headerujian', $id_header)->delete();
                $notDeletCheck = 1;
            }

            $detail = DetailUjian::create([
                'id_headerujian' => $id_header,
                'id_kelas' => $dt['id'],
                'tanggal_ujian' => $request->tanggal_ujian,
                'waktu_ujian' => $request->waktu_ujian,
                'status' => 0
            ]);

            if (!empty($dt['siswa'])) {

                foreach ($dt['siswa'] as $sw) {
                    PesertaUjian::create([
                        'nis' => $sw['nis'],
                        'id_detail_ujians' => $detail->id,
                    ]);
                }
            }
        }
        return response()->json("success");
    }
}
