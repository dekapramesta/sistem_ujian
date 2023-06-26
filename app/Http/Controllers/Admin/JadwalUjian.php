<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Models\jadwal_ujian;
use App\Models\Jenjang;
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
        $header = HeaderUjian::with('jadwal_ujian.mapel', 'detailujian.pesertaujian.siswa', 'guru', 'detailujian.kelas.jenjang', 'detailujian.kelas.jurusan')->get();
        // dd($header);
        // dd($header);
        return view('Admin.jadwal', compact('header'));
    }
    public function AddJadwalUjian()
    {

        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $jenjang = Jenjang::all();
        $tahun_akademik = ThAkademik::all();
        return view('Admin.add_ujian', compact('kelas', 'siswa', 'mapel', 'jenjang', 'tahun_akademik'));
    }
    public function postUjian(Request $request)
    {
        # code...
        $gurus = [];
        $id_header = 0;
        $id = 0;


        foreach ($request->data as $dt) {
            $dataJdw = jadwal_ujian::with('headerujian')->where(['id_jenjangs' => $dt['id_jenjang'], 'jenis_ujian' => $request->jenis_ujian, 'id_mapels' => $request->id_mapels, "id_th_akademiks" => $request->id_th_akademiks])->first();
            $mst_mpl_guru_kls = mst_mapel_guru_kelas::where(['id_mapels' => $request->id_mapels, 'id_kelas' => $dt['id']])->first();

            // return response()->json($dataJdw);
            if ($dataJdw == null) {
                $jdwlujian = jadwal_ujian::create([
                    'id_jenjangs' => $dt['id_jenjang'],
                    'id_th_akademiks' => $request->id_th_akademiks,
                    'id_mapels' => $request->id_mapels,
                    'jenis_ujian' => $request->jenis_ujian,
                ]);
                $id = $jdwlujian->id;
                // $header = HeaderUjian::create([
                //     'id_jadwalujian' => $id,
                //     'id_gurus' => $mst_mpl_guru_kls->id_gurus,
                //     'id_jenjangs' => $dt['id_jenjang'],
                //     'jumlah_soal' => $request->jumlah_soal,
                //     "status" => 0
                // ]);
                // $id_header = $header->id;
            } else {
                $id = $dataJdw->id;
            }

            if (!in_array($mst_mpl_guru_kls->id_gurus, $gurus)) {
                $searchHeaader = HeaderUjian::where('id_jadwalujian', $id)->where('id_gurus', $mst_mpl_guru_kls->id_gurus)->where('id_jenjangs', $dt['id_jenjang'])->where('status', '!=', 8)->first();
                if ($searchHeaader == null) {

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
                } else {
                    return response()->json(['status' => false]);
                }
            }

            $detail = DetailUjian::create([
                'id_headerujian' => $id_header,
                'id_kelas' => $dt['id'],
                'tanggal_ujian' => $dt['tgl_ujian'] . ' ' . $dt['jam_ujian'],
                'waktu_ujian' => $request->waktu_ujian,
            ]);
            foreach ($dt['siswa'] as $sw) {
                PesertaUjian::create([
                    'nis' => $sw['nis'],
                    'id_detail_ujians' => $detail->id,
                ]);
            }
        }
        return response()->json(['status' => true, 'message' => 'data berhasil dibuat']);
    }
    public function editJadwal($id)
    {
        # code...
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $jenjang = Jenjang::all();
        $tahun_akademik = ThAkademik::all();
        return view('Admin.edit_ujian', compact('kelas', 'siswa', 'mapel', 'jenjang', 'tahun_akademik'));
    }

    public function deleteUjian($id)
    {
        $data = HeaderUjian::find($id);
        $data->status = 8;
        $data->save();
        return redirect()->route('jadwal.ujian');
    }
}
