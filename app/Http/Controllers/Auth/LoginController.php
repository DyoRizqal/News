<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
      return view('lsp.auth.login');
    }

    public function postLogin(Request $r)
    {
      $username = $r->input('username');
      $password = $r->input('password');

      if (Auth::attempt(['user_name' => $username, 'password' => $password])) {
        if (Auth::user()->user_status == "Tidak Aktif") {
          Auth::logout();
          return redirect('login')->with('message','Akun anda belum diaktifkan.');
        } else {
          return redirect('/');
        }
      }
      return redirect('login')->with('message','Username atau password salah.');
    }

    public function getLogout()
    {
      Auth::logout();
      return redirect(url('/'));
    }
}
