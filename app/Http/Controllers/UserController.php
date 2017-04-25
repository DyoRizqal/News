<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function index()
    {
      $user = User::orderBy('user_namalengkap')->paginate(10);
      return view('lsp.users.index', ['data' => $user]);
    }

    public function create()
    {
      return view('lsp.users.create');
    }

    public function save(Request $r)
    {
      // // $message = [
      // //   'required' => 'Kolom :attribute harus diisi!',
      // // ];
      //
      // $this->validate($r, [
      //   'user_name'  => 'required|unique:users',
      //   'password'  => 'required',
      //   'nama'      => 'required|max:255',
      //   'user_email'     => 'required|email'
      // ]);
      //
      // // dd($r->all());
      //
      // $user = new User;
      // $user->user_name = $r->input('user_name');
      // $user->user_pass = bcrypt($r->input('password'));
      // $user->user_namalengkap = $r->input('nama');
      // $user->user_email = $r->input('user_email');
      // $user->user_status = $r->input('status');
      // $user->save();
      //
      // return redirect(url('users'));
    }

    public function activate($username)
    {
      $user = User::find($username);
      $user->user_status = 1;
      $user->save();

      return redirect(url('users'));
    }

    public function deactivate($username)
    {
      $user = User::find($username);
      $user->user_status = 2;
      $user->save();

      return redirect(url('users'));
    }
    public function delete($username)
    {
      $user = User::find($username)->delete();
      return redirect(url('users'));
    }
}
