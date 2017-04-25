@extends('lsp.layouts.design')
@section('content')
<title>Tambah Kategori</title>
<div class="container">
    <div class="row" style="margin-top: 20px">
      <div class="col s12 m12 left">
        <div class="card">
          <div class="card-content white black-text" style="font-size: 12pt;padding: 10px;">
              <form action="{{ url('categories/create') }}" method="post">
              {{ csrf_field() }}
             <div class="input-field col s12">
                <i class="material-icons prefix">view_module</i>
                <input id="nama" type="text" name="nama" class="validate" required autofocus>
                <label for="nama">Nama Kategori</label>
              </div>
              <div class="row">
              <div class="col s7">
              <p style="margin-left: 15px">
              <div class="col s3">
                <input class="with-gap" name="status" type="radio" value="1" id="test3"/>
                <label for="test3">Aktif</label>
              </div>
              <div class="col s4">
                <input class="with-gap" name="status" type="radio" value="2" id="test4"/>
                <label for="test4">Tidak Aktif</label>
              </div>
              </p>
              </div>
              </div>
               <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left: 15px">Tambah
                   <i class="material-icons right">send</i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection