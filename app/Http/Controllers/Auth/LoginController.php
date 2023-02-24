<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        # code...
        return view('auth.loginsiakad');
    }

    public function LoginAction(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd('oit');
            if (Auth::user()->verified == 1) {
                if (Auth::user()->jabatan == "admin") {
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->jabatan == "guru") {
                    dd('belum dibuat');
                    // $request->session()->regenerate();
                    // return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->jabatan == "siswa") {
                    dd('belum dibuat');
                    // $request->session()->regenerate();
                    // return redirect()->route('admin.dashboard');
                }
            } else {
                return redirect()->route('login.view')->withErrors(['Akun Non-Aktif']);
            }
        } else {
            return redirect()->route('login.view')->withErrors(['email atau Password salah']);
        }
    }
}
