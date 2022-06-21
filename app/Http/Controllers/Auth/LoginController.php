<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))  {
            if (Auth::user()->roles_id == 1) {
                return redirect()->route('staff/home')->with('message','Anda berhasil masuk');;
            } elseif (Auth::user()->roles_id == 2) {
                return redirect()->route('dosen/home')->with('message','Anda berhasil masuk');;
            } elseif (Auth::user()->roles_id == 3) {
                return redirect()->route('mahasiswa/home')->with('message','Anda berhasil masuk');;
            } elseif (Auth::user()->roles_id == 4) {
                return redirect()->route('mitra/home')->with('message','Anda berhasil masuk');;
            } elseif (Auth::user()->roles_id == 5) {
                return redirect()->route('assesor/home')->with('message','Anda berhasil masuk');;
            } elseif (Auth::user()->roles_id == 6) {
                return redirect()->route('alumni/home')->with('message','Anda berhasil masuk');;
            }
        } else {
            return redirect()->route('login')->with('error','Email atau Kata sandi salah!');
        }
    }
}
