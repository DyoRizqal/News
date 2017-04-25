<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Komentar;

class KomentarController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', ['except' => 'save']);
    }

    public function save(Request $r)
    {
      $comment = new Komentar;
      $comment->komentar_berita_id = $r->input('berita_id');
      $comment->komentar_email = $r->input('email');
      $comment->komentar_website = $r->input('website');
      $comment->komentar_isi = $r->input('isi');
      $comment->komentar_status = 2;
      $comment->komentar_tglinput = date('Y-m-d H:i:s');
      $comment->save();

      return redirect(url('item/' .  $r->input('berita_slug')));
    }

    public function index()
    {
      $comment = Komentar::orderBy('komentar_berita_id')->paginate(10);
      return view('lsp.comments.index', ['data' => $comment]);
    }

    public function delete($id)
    {
      Komentar::find($id)->delete();
      return redirect(url('comments'));
    }

    public function activate($id)
    {
      $comment = Komentar::find($id);
      $comment->komentar_status = 1;
      $comment->save();
      return redirect(url('comments'));
    }

    public function deactivate($id)
    {
      $comment = Komentar::find($id);
      $comment->komentar_status = 2;
      $comment->save();
      return redirect(url('comments'));
    }
}
