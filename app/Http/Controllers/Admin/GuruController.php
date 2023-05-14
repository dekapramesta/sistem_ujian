<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\mst_mapel_guru_kelas;
use App\Models\User;

class GuruController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $gurus = Guru::with('mst_mapel_guru_kelas')->orderBy('nama', 'ASC')->get();
        return view("admin.guru", compact('gurus', 'kelas', 'mapel'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $tanggal = substr($request->tanggal_lahir, 8, 2);
        $bulan = substr($request->tanggal_lahir, 5, 2);
        $tahun = substr($request->tanggal_lahir, 0, 4);
        $password = $tanggal . '' . $bulan . '' . $tahun;

        $User = User::create([
            'username' => $request->nip,
            'password' => bcrypt($password),
            'jabatan' => 'Guru',
        ]);

        $find_user = User::where('username', $request->nip)->first();

        $Guru = Guru::create([
            'id_user' => $find_user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        $mst = mst_mapel_guru_kelas::create([
            'id_mapels' => $request->mapel,
            'id_kelas' => $request->kelas,
            'id_gurus' => $Guru->id,
        ]);

        if ($mst) {
            return back()->with('success', 'Berhasil Tambah Data');
        } else {
            return back()->with('error', 'Gagal Tambah Data');
        }
    }
    public function edit(Request $request, $nip)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $Guru = Guru::where('nip', $nip)->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        $mst = mst_mapel_guru_kelas::where('id_gurus', $request->id_guru)->update([
            'id_mapels' => $request->mapel,
            'id_kelas' => $request->kelas
        ]);

        if ($mst) {
            return back()->with('success', 'Berhasil Edit Data');
        } else {
            return back()->with('error', 'Gagal Edit Data');
        }
    }

    public function delete(Request $request, $nip)
    {

        $Guru = Guru::where('nip', $nip)->delete();

        if ($Guru) {
            return back()->with('success', 'Berhasil Hapus Data');
        } else {
            return back()->with('error', 'Gagal Hapus Data');
        }
    }
}
