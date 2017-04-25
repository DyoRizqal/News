<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Kategori;
use App\Berita;
use App\Komentar;

class BeritaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', ['except' => ['dashboard', 'detail']]);
    }

    public function dashboard()
    {
      $utama = Berita::where('berita_utama','Ya')->inRandomOrder()->orderBy('berita_utama','desc')->paginate(9);
      $baru = Berita::orderBy('berita_tglinput', 'desc')->limit(4)->get();
      $populer = Berita::orderBy('berita_view', 'desc')->limit(4)->get();
      return view('lsp.dashboard.index', ['utama' => $utama, 'baru' => $baru, 'populer' => $populer]);
    }

    public function detail($slug)
    {
      $news = Berita::where('berita_link', $slug)->first();
      $news_random = Berita::inRandomOrder()->limit(4)->get();
      $kategori = Kategori::all();
      $comment = Komentar::whereKomentarBeritaId($news->berita_id)->whereKomentarStatus(1)->get();
      $news->berita_view = $news->berita_view + 1;
      $news->save();
      return view('lsp.dashboard.detail', ['data' => $news, 'rand' => $news_random, 'kategori' => $kategori, 'komentar' => $comment]);
    }

    public function index()
    {
      $news = Berita::orderBy('berita_tglinput','desc')->paginate(9);
      return view('lsp.news.index', ['data' => $news]);
    }

    public function create()
    {
      $cat = Kategori::all();
      return view('lsp.news.create', ['kategori' => $cat]);
    }

    public function save(Request $r)
    {
      $news = new Berita;
      $news->berita_kategori_id = $r->input('kategori');
      $news->berita_judul = $r->input('judul');
      $news->berita_detail = $r->input('detail');
      $news->berita_utama = $r->input('utama');
      $news->berita_link = str_slug($r->input('judul'), '-');
      $news->berita_view = 0;
      $news->berita_userinput = Auth::user()->user_name;
      $news->berita_tglinput = date('Y-m-d H:i:s');
      $news->berita_status = $r->input('status');
      $news->save();

      return redirect(url('news'));
    }

    public function edit($id)
    {
      $news = Berita::find($id);
      $cat = Kategori::all();
      return view('lsp.news.edit', ['berita' => $news, 'kategori' => $cat]);
    }

    public function update(Request $r)
    {
      $id = $r->input('id');
      $news = Berita::find($id);
      $news->berita_kategori_id = $r->input('kategori');
      $news->berita_judul = $r->input('judul');
      $news->berita_detail = $r->input('detail');
      $news->berita_utama = $r->input('utama');
      $news->berita_link = str_slug($r->input('judul'), '-');
      $news->berita_view = 0;
      $news->berita_userinput = Auth::user()->user_name;
      $news->berita_tglinput = date('Y-m-d H:i:s');
      $news->berita_status = $r->input('status');
      $news->save();

      return redirect(url('news'));
    }

    public function delete($id)
    {
      Berita::find($id)->delete();
      return redirect(url('news'));
    }
}
