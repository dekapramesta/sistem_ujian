<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MultipleSheetsExport;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();

        return view('Guru.profil', compact('guru'));
    }

    public function edit_profil(Request $request)
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        if($request->foto_profil) {
            $namafile_fotoprofil = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('img/user'), $namafile_fotoprofil);
            Guru::where('id_user', $user->id)->update([
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'foto_profil' => $namafile_fotoprofil
            ]);
        } else {
            Guru::where('id_user', $user->id)->update([
                'no_telp' => $request->no_telp,
                'email' => $request->email
            ]);
        }
        Alert::success('Berhasil', 'Berhasil Merubah Profil');
        return redirect()->back();
    }

    public function edit_password(Request $request)
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
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
