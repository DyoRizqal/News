@extends('lsp.layouts.design')
@section('content')
<title>Tambah Berita</title>
<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card">
    <div class="row">
        <div class="card-title green white-text" style="cursor:pointer; font-size: 12pt;padding: 10px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">
               Tambah Berita
        </div>
        <form action="{{ url('news/create') }}" method="post">
          {!! csrf_field() !!}
          <div class="card-content white black-text left col s12">
          <div class="input-field col s12">
          <i class="material-icons prefix">view_module</i>
            <select name="kategori">
              <option disabled selected>Pilih Kategori</option>
              @foreach ($kategori as $value)
                <option value="{{ $value->kategori_id }}" >{{ $value->kategori_nama }}</option>
              @endforeach
            </select>
            <label>Kategori</label>
          </div>
          <div class="input-field col s12">
              <i class="material-icons prefix">timeline</i>
              <input id="icon_prefix" type="text" class="validate"  name="judul">
              <label for="icon_prefix">Judul</label>
          </div>
           <div class="input-field col s12">
              <i class="material-icons prefix">mode_edit</i>
              <textarea id="icon_prefix2" class="materialize-textarea" name="detail"></textarea>
              <label for="icon_prefix2">Berita Detail</label>
           </div>
           <div class="row" style="margin-left: 18px">
           <div class="col s12">
              <div class="col s7">
                <p style="margin-left: 15px">
                  <label>Apakah Ini Berita Utama ?</label><br><br>
              <div class="col s3">
                <input class="with-gap" name="utama" type="radio" value="1" id="test3"/>
                <label for="test3">Ya</label>
              </div>
              <div class="col s4">
                <input class="with-gap" name="utama" type="radio" value="2" id="test4"/>
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
                <input class="with-gap" name="status" type="radio" value="1" id="test5" />
                <label for="test5">Aktif</label>
              </div>
              <div class="col s4">
                <input class="with-gap" name="status" type="radio" value="2" id="test6" />
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