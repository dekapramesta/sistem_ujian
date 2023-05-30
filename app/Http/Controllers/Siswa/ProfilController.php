<?php

namespace App\Http\Controllers\Siswa;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = Siswa::where('id_user', $user->id)->first();

        return view('Siswa.profil', compact('siswa'));
    }

    public function edit_profil(Request $request)
    {
        $user = Auth::user();
        if($request->foto_profil) {
            $namafile_fotoprofil = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('img/user'), $namafile_fotoprofil);
            Siswa::where('id_user', $user->id)->update([
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'foto_profil' => $namafile_fotoprofil
            ]);
        } else {
            Siswa::where('id_user', $user->id)->update([
                'no_telp' => $request->no_telp,
                'email' => $request->email
            ]);
        }
        Alert::success('Berhasil', 'Berhasil Merubah Profil');
        return redirect()->back();
    }

    public function delete_foto_profil(Request $request)
    {
        if(file_exists(public_path('img/user/'.$request->foto_profil))) {
            unlink(public_path('img/user/'.$request->foto_profil));
        }
        $siswa = Siswa::where('foto_profil', $request->foto_profil)->update([
            'foto_profil' => null
        ]);
        if($siswa) {
            return response()->json([
                'success' => true,
                'message' => 'Foto Profil Berhasil Dihapus!.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menghapus Foto Profil',
            ]);
        }
    }

    public function edit_password(Request $request)
    {
        $user = Auth::user();
        $siswa = Siswa::where('id_user', $user->id)->first();
        $ubah_password = "profile-change-password";
        if(Hash::check($request->password, $user->password)) {
            if($request->newpassword == $request->renewpassword) {
                User::where('id', $user->id)->update([
                    'password'  => bcrypt($request->newpassword)
                ]);
                Alert::success('Berhasil', 'Berhasil Merubah Password');
                return redirect()->back();
            } else {
                Alert::error('Gagal', 'Password Baru tidak sama dengan Re-enter Password Baru');
                return redirect()->back()->with(compact('ubah_password'));
            }
        } else {
            Alert::error('Gagal', 'Password salah');
            return redirect()->back()->with(compact('ubah_password'));
        }
    }
}
