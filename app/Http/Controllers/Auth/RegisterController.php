<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getRegister()
    {
      return view('lsp.auth.register');
    }

    public function postRegister(Request $r)
    {
      $this->validate($r, [
        'user_name'  => 'required|unique:users',
        'password'  => 'required',
        'nama'      => 'required|max:255',
        'user_email'     => 'required|email|unique:users'
      ]);

      $username = $r->input('user_name');
      $password = $r->input('password');

      $user = new User;
      $user->user_name = $username;
      $user->user_pass = bcrypt($password);
      $user->user_namalengkap = $r->input('nama');
      $user->user_email = $r->input('user_email');
      $user->user_status = 1;
      $user->save();

      if (Auth::attempt(['user_name' => $username, 'password' => $password])) {
        return redirect('/');
      }
      return redirect('login')->with('message','Username atau password salah.');
    }
}
