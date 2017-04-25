@extends('lsp.layouts.design')
@section('content')
<title>Edit {{$berita->berita_judul}}</title>
<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card">
    <div class="row">
        <div class="card-title green white-text"  title="{{ $berita->berita_judul }}" style="cursor:pointer; font-size: 12pt;padding: 10px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">
               Edit {{substr($berita->berita_judul,0,50) }}
        </div>
        <form action="{{ url('news/edit') }}" method="post">
          {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{ $berita->berita_id }}">
          <div class="card-content white black-text left col s12">
          <div class="input-field col s12">
          <i class="material-icons prefix">view_module</i>
            <select name="kategori">
              <option disabled selected>Pilih Kategori</option>
              @foreach ($kategori as $value)
                <option value="{{ $value->kategori_id }}" @if ($value->kategori_id == $berita->berita_kategori_id) selected @endif >{{ $value->kategori_nama }}</option>
              @endforeach
            </select>
            <!-- <select>

              <option value="" name="kategori" disabled selected>Pilih Kategori</option>
               @foreach ($kategori as $value)
                <option value="{{ $value->kategori_id }}" @if ($value->kategori_id == $berita->berita_kategori_id) selected @endif >{{ $value->kategori_nama }}</option>
               @endforeach
            </select> -->
            <label>Kategori</label>
          </div>
          <div class="input-field col s12">
              <i class="material-icons prefix">timeline</i>
              <input id="icon_prefix" type="text" class="validate"  name="judul" value="{{ $berita->berita_judul }}">
              <label for="icon_prefix">Judul</label>
          </div>
           <div class="input-field col s12">
              <i class="material-icons prefix">mode_edit</i>
              <textarea id="icon_prefix2" class="materialize-textarea" name="detail">{{ $berita->berita_detail }}</textarea>
              <label for="icon_prefix2">Detail Berita</label>
           </div>
           <div class="row" style="margin-left: 18px">
           <div class="col s12">
              <div class="col s7">
                <p style="margin-left: 15px">
                  <label>Apakah Ini Berita Utama ?</label><br><br>
              <div class="col s3">
                <input class="with-gap" name="utama" type="radio" value="1" id="test3" @if ($berita->berita_utama == "Ya") checked @endif/>
                <label for="test3">Ya</label>
              </div>
              <div class="col s4">
                <input class="with-gap" name="utama" type="radio" value="2" id="test4" @if ($berita->berita_utama == "Tidak") checked @endif/>
                <label for="test4">Tidak</label>
              </div>
                </p>
              </div>
           </div>
           </div>
           <div class="row" style="margin-left: 18px">
           <div class="col s12">
              <div class="col s7">
                <p style="margin-left: 15px">
                  <label>Status :</label><br><br>
              <div class="col s3">
                <input class="with-gap" name="status" type="radio" value="1" id="test5" @if ($berita->berita_status == "Aktif") checked @endif/>
                <label for="test5">Aktif</label>
              </div>
              <div class="col s4">
                <input class="with-gap" name="status" type="radio" value="2" id="test6" @if ($berita->berita_status == "Tidak Aktif") checked @endif/>
                <label for="test6">Tidak Aktif</label>
              </div>
                </p>
              </div>
              </div>
           </div>
           <div class="col s12" style="margin-left: 45px">
            <button class="btn waves-effect waves-light" type="submit" name="action">Ubah
                   <i class="material-icons right">send</i>
              </button>
           </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div> 
@endsection