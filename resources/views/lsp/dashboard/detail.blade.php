@extends('lsp.layouts.design')
@section('content')
<title>{{ $data->berita_judul }}</title>
  <div class="row">
        <div class="col s12 m8 left">
          <div class="card">
              <div class="card-title white-text"  title="{{ $data->berita_judul }}" style="font-size: 12pt;padding: 5px;background: #009680" >
                {{ $data->berita_judul }}
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 20px;">
              <p style="white-space: pre-line;">{{$data->berita_detail}}</p>
            </div>
            <div class="card-action">
            @php
              $komentar = \App\Komentar::where('komentar_berita_id',$data->berita_id)->Where('komentar_status','Aktif')->get();
            @endphp
              <a href="@if(count($komentar)==0) #komentar @else #komentars @endif" class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip=" {{count($komentar)}} Komentar"><i class="material-icons">forum</i>{{count($komentar)}} Komentar</a>
              <a class="black-text ba pa waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip=" {{$data->berita_view}} Dilihat"><i class="material-icons">visibility</i>{{$data->berita_view}} Dilihat</a>
              <a class="black-text ba pa waves-effect  tooltipped" data-position="bottom" data-delay="50" data-tooltip=" Dibuat Pada {{date_format(date_create($data->berita_tglinput),'d M Y')}} Pukul {{date_format(date_create($data->berita_tglinput),'H:i')}}"><i class="material-icons">date_range</i>Diposting pada {{date_format(date_create($data->berita_tglinput),"d M Y H:i")}}</a>
            </div>
          </div>
             <div class="card" style="margin-top: -20px;" id="komentar">
              <div class="card-title white black-text"  title="{{ $data->berita_judul }}" style="font-size: 19pt;padding: 15px" >
                Komentar
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 10px;">
              <form action="{{ url('comments/create') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="berita_id" value="{{ $data->berita_id }}">
              <input type="hidden" name="berita_slug" value="{{ $data->berita_link }}">
              <div class="input-field col s12">
                   <i class="material-icons prefix">email</i>
                   <input id="email" type="text" name="email" class="validate" value="@if (Auth::check()) {{Auth::user()->user_email}} @else @endif" @if (Auth::check()) readonly="" @else @endif required autofocus>
                   <label for="email">Email</label>
              </div>
               <div class="input-field col s12">
                   <i class="material-icons prefix">language</i>
                   <input id="website" type="text" name="website" class="validate" required autofocus>
                   <label for="website">Website</label>
              </div>
              <div class="input-field col s12">
                   <i class="material-icons prefix">mode_edit</i>
                   <textarea id="icon_prefix2" spellcheck="false" class="materialize-textarea" name="isi"></textarea>
                   <label for="icon_prefix2">Komentar</label>
              </div>
               <button class="btn waves-effect waves-light" type="submit" name="action">Komentar
                   <i class="material-icons right">send</i>
              </button>
            </form>
            </div>
            <div class="card-action" id="komentars">
            @foreach ($komentar as $key => $data)
            <div class="card horizontal">
             <img src="{{url('/prof.png')}}" class="circle responsive-img" style="width: 100px;height: 100px;padding: 10px">
              <div class="card-stacked">
                <div class="card-content">
                  <p class="ema"><b>{{ $data->komentar_email }}</p>
                  <p style="font-size: 8pt">{{ $data->komentar_website }}</b></p>
                </div>
                <div class="card-action" >
                  <p style="white-space: pre-line;margin-top: -10px">{{ $data->komentar_isi }}</p>
                </div>
              </div>
            </div>
            @endforeach
            </div>
          </div>

        </div>
        <div class="col s12 m4 hide-on-small-only">
         <div class="card-title white-text"  title="{{ $data->berita_judul }}" style="font-size: 12pt;padding: 5px;background: #009680" >
         Berita Lainnya 
         </div>
          <div class="row">
          @foreach ($rand as $key => $value)
        <div class="col s12 m6 hide-on-small-only">
          <div class="card">
              <div class="card-title white-text"  title="{{ $value->berita_judul }}" style="cursor:pointer; font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;background: #009688">
                {{substr($value->berita_judul,0,25) }}
              </div>
            <div class="card-content white black-text" style="font-size: 12pt;padding: 4px;overflow: hidden;text-overflow:ellipsis;height: 100px">
              <p>{{$value->berita_detail}}</p>
            </div>
            <div class="card-action">
            <a href="{{ url('item/'.$value->berita_link) }}" data-position="bottom" data-delay="50" data-tooltip="Lihat Detail" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" style="margin-top: -40px;position: absolute;right: 10px;"><i class="material-icons">keyboard_arrow_right</i></a>
            </div>
          </div>
        </div>
    @endforeach
    </div>
    <div class="row">
      <div class="col s12">
        <div class="card-title white-text"  title="{{ $data->berita_judul }}" style="font-size: 12pt;padding: 5px;background: #009680;margin-bottom: 16px" >
         Kategori
         </div>
                @foreach ($kategori as $key => $value)
                  <ul class="collection with-header" style="margin-top: -16px">
                  @php
                    $jumlah = \App\Berita::where('berita_kategori_id',$value->kategori_id)->get();
                  @endphp
                    <li class="collection-item"><div>{{$value->kategori_nama}} ({{count($jumlah)}})<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                  </ul>
                @endforeach
            </div>
      </div>
   </div>
   
@endsection