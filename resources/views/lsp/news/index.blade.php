@extends('lsp.layouts.design')
@section('content')
<title>Data Berita</title>
  <style media="screen">
    th, td {
      border: 1px solid;
    }
  </style>
  <div class="row">
   @foreach ($data as $key => $value)
    @php
          $cat = \App\Kategori::find($value->berita_kategori_id);
        @endphp
        <div class="col s12 m4">
          <div class="card">
              <div class="card-title white-text judul"  title="{{ $value->berita_judul }}" style="font-size: 12pt">
                {{substr($value->berita_judul,0,50) }}
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 4px;overflow: hidden;text-overflow:ellipsis;height: 170px">
              <p>{{substr($value->berita_detail,0,300) }}...</p>
            </div>
            <div class="card-action">
            <a href="#!" class="btn-floating halfway-fab waves-effect waves-light red dropdown-button" style="margin-top: -40px;position: absolute;right: 10px;" data-activates='dropdown{{$value->berita_id}}'><i class="material-icons">keyboard_arrow_down</i></a>
              <ul id="dropdown{{$value->berita_id}}" class="dropdown-content" style="margin-top: -0px">
                <li><a href="{{ url('item/'.$value->berita_link) }}" class="green-text"><i class="material-icons left">chrome_reader_mode</i>Lihat Detail</a></li>
                <li><a href="{{ url('news/edit/'.$value->berita_id) }}" class="green-text"><i class="material-icons left">launch</i>Edit</a></li>
                <li><a href="{{ url('news/delete/'.$value->berita_id) }}"" class="green-text"><i class="material-icons left">delete</i>Hapus</a></li>
              </ul>
            @php
              $komentar = \App\Komentar::where('komentar_berita_id',$value->berita_id)->Where('komentar_status','Aktif')->get();
            @endphp
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip=" {{count($komentar)}} Komentar"><i class="material-icons">forum</i>{{count($komentar)}}</a>
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip=" {{$value->berita_view}} Dilihat"><i class="material-icons">visibility</i>{{$value->berita_view}}</a>
              <a class="black-text ba pa waves-effect  tooltipped" data-position="bottom" data-delay="50" data-tooltip=" Dibuat Pada {{date_format(date_create($value->berita_tglinput),'d M Y')}} Pukul {{date_format(date_create($value->berita_tglinput),'H:i')}}"><i class="material-icons">date_range</i>{{date_format(date_create($value->berita_tglinput),"d M Y H:i")}}</a>
              <div class="row" style="margin-bottom: -15px">
              <div class="col s12">
                <div class="col s12 m6">
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Kategori {{$cat->kategori_nama}}"><i class="material-icons">view_module</i>{{$cat->kategori_nama}}</a>
              </div>
              <div class="col s6">
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Dibuat oleh {{$value->berita_userinput}}"><i class="material-icons">person</i>{{$value->berita_userinput}}</a>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    @endforeach
      </div>
       <div class="fixed-action-btn">
    <a class="btn-floating btn-large red tooltipped" href="{{ url('news/create') }}" data-position="top" data-delay="50" data-tooltip="Tambah Berita">
      <i class="large material-icons">mode_edit</i>
    </a>
  </div>
@endsection
