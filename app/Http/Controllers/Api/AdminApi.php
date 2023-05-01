<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\mst_mapel_guru_kelas;
use App\Models\Siswa;
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
}
