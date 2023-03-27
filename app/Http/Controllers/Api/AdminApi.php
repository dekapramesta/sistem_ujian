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
        $kelas = mst_mapel_guru_kelas::with('kelas.jurusan')->where('id_mapels', $request->id)->groupBy('id_kelas')->get();
        return response()->json($kelas, 200);
    }
    public function getSiswaMapel(Request $request)
    {
        $siswa = mst_mapel_guru_kelas::with('kelas.siswa')->where('id_mapels', $request->id)->groupBy('id_kelas')->get();
        return response()->json($siswa, 200);
    }
    public function getSiswaByKelas(Request $request)
    {
        $this->id_kelas = $request->id;
        $siswa = Kelas::with('siswa', 'jurusan')->whereHas('siswa', function ($query) {
            return $query->whereIn('id_kelas', $this->id_kelas);
        })->get();
        return response()->json($siswa);
    }
}
