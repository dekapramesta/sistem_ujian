<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\mst_mapel_guru_kelas;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Mockery\Undefined;

class GuruController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('jenjang', 'jurusan')->get();
        $mapel = Mapel::with('jurusan')->get();
        $gurus = Guru::with('mst_mapel_guru_kelas.kelas.jenjang', 'mst_mapel_guru_kelas.mapel', 'mst_mapel_guru_kelas.kelas.jurusan', 'mst_mapel_guru_kelas.kelas')->orderBy('nama', 'ASC')->get();
        return view("Admin.guru", compact('gurus', 'kelas', 'mapel'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'mapel' => 'required'
        ]);
        $response = array();

        // dd($request);

        $tanggal = substr($request->tanggal_lahir, 8, 2);
        $bulan = substr($request->tanggal_lahir, 5, 2);
        $tahun = substr($request->tanggal_lahir, 0, 4);
        $password = $tanggal . '' . $bulan . '' . $tahun;
        $checkUser = User::where('username', $request->nip)->first();
        if ($checkUser) {
            array_push($response, 'Guru Sudah Ada');
            return response()->json(['result' => $response]);
        }
        $tgl = Carbon::parse($request->tanggal_lahir)->format('d-m-Y');
        $real_tgl = str_replace("-", "", $tgl);

        $User = User::create([
            'username' => $request->nip,
            'password' => bcrypt($real_tgl),
            'jabatan' => 'guru',
            'verified' => 0
        ]);

        $find_user = User::where('username', $request->nip)->first();
        $kelas = $request->kelas;
        $mapel = $request->mapel;
        $Guru = Guru::create([
            'id_user' => $find_user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        foreach ($kelas as $indexkls => $kls) {
            foreach ($mapel as $indexmpl => $mpl) {
                if ($indexkls == $indexmpl) {
                    $check_mst = mst_mapel_guru_kelas::where('id_kelas', $kls)->where('id_mapels', $mpl)->first();
                    if (!$check_mst) {
                        $mst = mst_mapel_guru_kelas::create([
                            'id_mapels' => $mpl,
                            'id_kelas' => $kls,
                            'id_gurus' => $Guru->id,
                        ]);
                        // array_push($response, ' Sukses');
                        // array_push($response, $check_mst->kelas->jenjang->nama_jenjang . ' ' . $check_mst->kelas->nama_kelas . ' ' . $check_mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $check_mst->mapel->nama_mapel . ' Sukses');
                        array_push($response, $mst->kelas->jenjang->nama_jenjang . ' ' . $mst->kelas->nama_kelas . ' ' . $mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $mst->mapel->nama_mapel . ' Sukses');
                    } else {
                        array_push($response, $check_mst->kelas->jenjang->nama_jenjang . ' ' . $check_mst->kelas->nama_kelas . ' ' . $check_mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $check_mst->mapel->nama_mapel . ' Gagal');
                        // array_push($response, $check_mst->kelas->jenjang->nama_jenjang);
                    }
                }
            }
        }
        return response()->json(['result' => $response]);
        // return back()->with('success', 'Berhasil Tambah Data');
    }
    public function edit(Request $request)
    {
        // dd($request);

        $request->validate([
            'id_guru' => 'required',
            'nama' => 'required',
            'nip' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'mapel' => 'required'
        ]);

        $mst_guru = array();
        foreach ($request->kelas as $index => $kls) {
            if (isset($request->mst_id[$index])) {
                array_push($mst_guru, ['id' => $request->mst_id[$index], 'id_kelas' => $kls, 'id_mapel' => $request->mapel[$index]]);
            } else {

                array_push($mst_guru, ['id' => null, 'id_kelas' => $kls, 'id_mapel' => $request->mapel[$index]]);
            }
        }

        $Guru = Guru::where('id', $request->id_guru)->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);
        $tanggal = substr($request->tanggal_lahir, 8, 2);
        $bulan = substr($request->tanggal_lahir, 5, 2);
        $tahun = substr($request->tanggal_lahir, 0, 4);
        $password = $tanggal . '' . $bulan . '' . $tahun;
        $tgl = Carbon::parse($request->tanggal_lahir)->format('d-m-Y');
        $real_tgl = str_replace("-", "", $tgl);

        $gr = Guru::where('id', $request->id_guru)->first();
        $users = User::where('id', $gr->id_user)->update([
            'username'=>$request->nip,
            // 'password'=>bcrypt($real_tgl)
        ]);


        $response = array();
        // array_push($response, $gr->id_user);

        $mstall = mst_mapel_guru_kelas::where('id_gurus', $request->id_guru)->get();
        foreach ($mstall as $mst_all) {
            // $mst_edit = mst_mapel_guru_kelas::find($mst_all->id);
            if (in_array($mst_all->id, $request->mst_id)) {
                foreach ($mst_guru as $mgr) {
                    if ($mgr['id'] == $mst_all->id) {

                        $mst_check = mst_mapel_guru_kelas::where('id_mapels', $mgr['id_mapel'])->where('id_kelas', $mgr['id_kelas'])->where('id_gurus', '!=', $request->id_guru)->first();
                        try {
                            //code...
                            if (!$mst_check) {
                                $mst_edit = mst_mapel_guru_kelas::find($mgr['id']);
                                $mst_edit->id_mapels = $mgr['id_mapel'];
                                $mst_edit->id_kelas = $mgr['id_kelas'];
                                $mst_edit->save();

                                array_push($response, $mst_edit->kelas->jenjang->nama_jenjang . ' ' . $mst_edit->kelas->nama_kelas . ' ' . $mst_edit->kelas->jurusan->nama_jurusan . ' Mapel ' . $mst_edit->mapel->nama_mapel . ' Sukses');
                            } else {

                                array_push($response, $mst_check->kelas->jenjang->nama_jenjang . ' ' . $mst_check->kelas->nama_kelas . ' ' . $mst_check->kelas->jurusan->nama_jurusan . ' Mapel ' . $mst_check->mapel->nama_mapel . ' Sudah ada');
                            }
                        } catch (Exception $th) {
                            return response()->json(['result' => ['masuk kene']]);
                        }
                    }
                }
            } else {
                // mst_mapel_guru_kelas::where('id', $mst_all->id)->delete();

                $edit= mst_mapel_guru_kelas::where('id', $mst_all->id)->first();
                $edit->id_gurus = null;
                $edit->save();

            }
        }
        foreach ($mst_guru as $mgr_null) {
            if ($mgr_null['id'] == null) {

                $check_mst = mst_mapel_guru_kelas::where('id_kelas', $mgr_null['id_kelas'])->where('id_mapels', $mgr_null['id_mapel'])->whereNotNull('id_gurus')->first();
                if (!$check_mst) {
                    $edit_mst = mst_mapel_guru_kelas::where('id_kelas', $mgr_null['id_kelas'])->where('id_mapels', $mgr_null['id_mapel'])->first();
                    if(!$edit_mst) {
                        $mst = mst_mapel_guru_kelas::create([
                            'id_mapels' => $mgr_null['id_mapel'],
                            'id_kelas' => $mgr_null['id_kelas'],
                            'id_gurus' => $request->id_guru,
                        ]);
                        array_push($response, $mst->kelas->jenjang->nama_jenjang . ' ' . $mst->kelas->nama_kelas . ' ' . $mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $mst->mapel->nama_mapel . ' Sukses');

                    } else {
                        $edit_mst->id_gurus = $request->id_guru;
                        $edit_mst->save();
                        array_push($response, $edit_mst->kelas->jenjang->nama_jenjang . ' ' . $edit_mst->kelas->nama_kelas . ' ' . $edit_mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $edit_mst->mapel->nama_mapel . ' Sukses');

                    }
                    // array_push($response, $check_mst->kelas->jenjang->nama_jenjang . ' ' . $check_mst->kelas->nama_kelas . ' ' . $check_mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $check_mst->mapel->nama_mapel . ' Sukses');

                } else {
                    array_push($response, $check_mst->kelas->jenjang->nama_jenjang . ' ' . $check_mst->kelas->nama_kelas . ' ' . $check_mst->kelas->jurusan->nama_jurusan . ' Mapel ' . $check_mst->mapel->nama_mapel . ' Sudah ada');
                    // array_push($response, $check_mst->kelas->jenjang->nama_jenjang);
                }
            }
        }

        return response()->json(['result' => $response]);
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
