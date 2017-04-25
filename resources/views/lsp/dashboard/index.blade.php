@extends('lsp.layouts.design')
@section('content')
<title>Dashboard</title>
<div class="row">
<div class="col s12">
<div class="col s12 m9">
<div style="margin-top: 20px;padding: 10px;font-size: 15pt" class="red white-text col s12"><i class="material-icons left">picture_in_picture</i> Berita Utama </div>
   <div class="row">
   @foreach ($utama as $key => $value)
        <div class="col s12 m4">
          <div class="card">
              <div class="card-title red white-text"  title="{{ $value->berita_judul }}" style="cursor:pointer; font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">
                {{substr($value->berita_judul,0,50) }}
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 4px;overflow: hidden;text-overflow:ellipsis;height: 170px">
              <p>{{substr($value->berita_detail,0,300) }}...</p>
            </div>
            <div class="card-action">
            <a href="{{ url('item/'.$value->berita_link) }}" data-position="bottom" data-delay="50" data-tooltip="Lihat Detail" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" style="margin-top: -40px;position: absolute;right: 10px;"><i class="material-icons">keyboard_arrow_right</i></a>
            @php
              $komentar = \App\Komentar::where('komentar_berita_id',$value->berita_id)->Where('komentar_status','Aktif')->get();
            @endphp
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip=" {{count($komentar)}} Komentar"><i class="material-icons">forum</i>{{count($komentar)}}</a>
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip=" {{$value->berita_view}} Dilihat"><i class="material-icons">visibility</i>{{$value->berita_view}}</a>
              <a class="black-text ba pa waves-effect  tooltipped" data-position="bottom" data-delay="50" data-tooltip=" Dibuat Pada {{date_format(date_create($value->berita_tglinput),'d M Y')}} Pukul {{date_format(date_create($value->berita_tglinput),'H:i')}}"><i class="material-icons">date_range</i>{{date_format(date_create($value->berita_tglinput),"d M Y H:i")}}</a>
            </div>
          </div>
        </div>
    @endforeach
      </div>
    </div>
    

    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

    <div class="col s12 m3">
    <div style="margin-top: 20px;padding: 10px;font-size: 15pt; background: #009688" class=" white-text col s12"><i class="material-icons left">fiber_new</i> Berita Terbaru </div>
   <div class="row">
   @foreach ($baru as $key => $value)
        <div class="col s12 m6">
          <div class="card">
              <div class="card-title white-text"  title="{{ $value->berita_judul }}" style="cursor:pointer; font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;background: #009688">
                {{substr($value->berita_judul,0,50) }}
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 4px;overflow: hidden;text-overflow:ellipsis;height: 100px">
              <p>{{substr($value->berita_detail,0,300) }}...</p>
            </div>
            <div class="card-action">
            <a href="@if (Auth::check()) {{ url('item/'.$value->berita_link) }} @else {{url('login')}} @endif" data-position="bottom" data-delay="50" data-tooltip="Lihat Detail" class="btn-floating halfway-fab waves-effect waves-light tooltipped" style="margin-top: -40px;position: absolute;right: 10px;background: #009688"><i class="material-icons">keyboard_arrow_right</i></a>
            </div>
          </div>
        </div>
    @endforeach
      </div>
    <ul class="pagination center">
     {{ $utama->links() }}
    </ul>
 
 <!-- ---------------------------------------------------------------------------------------------------------------------- -->


  <div style="margin-top: 20px;padding: 10px;font-size: 15pt" class="blue white-text col s12"><i class="material-icons left">stars</i> Berita Populer </div>
   <div class="row">
   @foreach ($populer as $key => $value)
        <div class="col s12 m6">
          <div class="card">
              <div class="card-title blue white-text"  title="{{ $value->berita_judul }}" style="cursor:pointer; font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">
                {{substr($value->berita_judul,0,50) }}
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 4px;overflow: hidden;text-overflow:ellipsis;height: 100px">
              <p>{{substr($value->berita_detail,0,300) }}...</p>
            </div>
            <div class="card-action">
            <a href="@if (Auth::check()) {{ url('item/'.$value->berita_link) }} @else {{url('login')}} @endif" data-position="bottom" data-delay="50" data-tooltip="Lihat Detail" class="btn-floating halfway-fab waves-effect waves-light blue tooltipped" style="margin-top: -40px;position: absolute;right: 10px;"><i class="material-icons">keyboard_arrow_right</i></a>
            </div>
          </div>
        </div>
    @endforeach
      </div>

        <style type="text/css">
        .ba i{
         margin-right: 4px;
         margin-left: -1px;
         float: left;
        }
        .ba {
          cursor: pointer;
          font-size: 10pt;
        }
        .card-title{
          margin-top: 20px;
        }
        .pa{
          padding: 10px;
          margin-left: -15px;
          border-radius: 5px;
        }
      </style>

@endsection
