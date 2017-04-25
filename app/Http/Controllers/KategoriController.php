<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Auth;

class KategoriController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $cat = Kategori::orderBy('kategori_nama')->paginate(10);
      return view('lsp.categories.index', ['data' => $cat]);
    }

    public function create()
    {
      return view('lsp.categories.create');
    }

    public function save(Request $r)
    {
      $cat = new Kategori;
      $cat->kategori_nama = $r->input('nama');
      $cat->kategori_status = $r->input('status');
      $cat->kategori_tglinput = date('Y-m-d H:i:s');
      $cat->kategori_userinput = Auth::user()->user_name;
      $cat->save();

      return redirect(url('categories'));
    }

    public function edit($id)
    {
      $cat = Kategori::find($id);
      return view('lsp.categories.edit', ['data' => $cat]);
    }

    public function update(Request $r)
    {
      $id = $r->input('id');
      $cat = Kategori::find($id);
      $cat->kategori_nama = $r->input('nama');
      $cat->kategori_status = $r->input('status');
      $cat->kategori_tglinput = date('Y-m-d H:i:s');
      $cat->kategori_userinput = Auth::user()->user_name;
      $cat->save();

      return redirect(url('categories'));
    }

    public function delete($id)
    {
      Kategori::find($id)->delete();
      return redirect(url('categories'));
    }

    public function activate($id)
    {
      $cat = Kategori::find($id);
      $cat->kategori_status = 1;
      $cat->save();

      return redirect(url('categories'));
    }

    public function deactivate($id)
    {
      $cat = Kategori::find($id);
      $cat->kategori_status = 2;
      $cat->save();

      return redirect(url('categories'));
    }
}
