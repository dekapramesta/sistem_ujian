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
    public function getUjian(Request $request)
    {
        $header_ujians = HeaderUjian::with('jadwal_ujian.th_akademiks')->where('id_jenjangs', $request->id_jenjang)->whereHas('jadwal_ujian', function ($query) use ($request) {
            return $query->where('id_mapels', $request->id);
        })->get();
        return response()->json($header_ujians, 200);
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
        $data = HeaderUjian::with('detailujian.pesertaujian', 'jadwal_ujian.mapel', 'jadwal_ujian.th_akademiks')->where('id', $request->id)->first();
        foreach ($data->detailujian as $key => $dtl) {
            array_push($result, Kelas::with('jurusan')->where('id', $dtl->id_kelas)->first());
            $result[$key]['siswa'] = array();
            foreach ($dtl->pesertaujian  as $pst_ind => $pst) {
                array_push($nis, Siswa::where('nis', $pst->nis)->first());
            }
            $result[$key]['siswa'] = $nis;
            $nis = [];
        }


        return response()->json(['data' => $data, 'result' => $result, 'nis' => $nis]);
    }

    public function postUjianEd(Request $request)
    {
        # code...


        $notDeletCheck = 0;

        $gurus = [];
        $id_header = $request->id_header;
        $id = 0;


        foreach ($request->data as $dt) {

            $mst_mpl_guru_kls = mst_mapel_guru_kelas::where(['id_mapels' => $request->id_mapels, 'id_kelas' => $dt['id']])->first();

            // return response()->json($dataJdw);


            $header = HeaderUjian::find($id_header);
            // return response()->json($header);





            $header->jumlah_soal = $request->jumlah_soal;
            $header->save();
            // return response()->json("oi");




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
                'tanggal_ujian' => $dt['tgl_ujian'].' '.$dt['jam_ujian'],
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
