<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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
                'username' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->jabatan == "admin") {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->jabatan == "guru") {
                $request->session()->regenerate();
                if(Auth::user()->verified == 0) {
                    return redirect()->route('guru.aktivasi');
                } else {
                    return redirect()->route('guru.mapel');
                }
            } elseif (Auth::user()->jabatan == "siswa") {
                $request->session()->regenerate();
                if(Auth::user()->verified == 0) {
                    return redirect()->route('siswa.aktivasi');
                } else {
                    return redirect()->route('siswa.dashboard');
                }
            }
        } else {
            return redirect()->route('login.view')->withErrors(['Username atau Password salah']);
        }
    }

    public function kirimOtp()
    {
        return view('auth.kirimotp');
    }

    public function verifikasiOtp(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
            ]
        );

        $otp = random_int(100000, 999999);
        $kirimOtp = User::where('username', $request->username)->update([
            'otp' => $otp,
        ]);
        if($kirimOtp) {
            $user = User::where('username', $request->username)->first();
            $request->session()->put('user_id', $user->id);

            if($user->jabatan == "admin") {
                $noTelp = Admin::where('id_user', $user->id)->first();
            } elseif($user->jabatan == "guru") {
                $noTelp = Guru::where('id_user', $user->id)->first();
            } elseif($user->jabatan == "siswa") {
                $noTelp = Siswa::where('id_user', $user->id)->first();
            }

            $message = "Hi, ".$noTelp->nama."!\n\nKode OTP Anda *".$otp."*, masukkan kode OTP berikut untuk mengganti password Anda. Jangan bagikan kode OTP kepada siapapun\n\n-Admin";

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'target' => $noTelp->no_telp,
            'message' => $message,
            'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Uz@i_wGo9ETcb6aQS9Wx' //change TOKEN to your actual token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            return view('auth.verifikasiotp');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate(
            [
                'otp' => 'required',
            ]
        );

        $cekOtp = User::where('otp', $request->otp)->first();
        if($cekOtp) {
            return view('auth.resetpassword');
        } else {
            return redirect()->back();
        }
    }

    public function savePassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required',
                'password2' => 'required',
            ]
        );

        if($request->password == $request->password2) {
            $user_id = $request->session()->get('user_id');

            $savePassword = User::where('id', $user_id)->update([
                'password' => bcrypt($request->password),
            ]);

            if($savePassword) {
                $request->session()->forget('user_id');
                return redirect()->route('login.view');
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.view');
    }
}
