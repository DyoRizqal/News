@extends('lsp.layouts.design')
@section('content')
<title>Komentar</title>
<style type="text/css">
    th, td {
      border: 1px solid #ededed;
    }
    th{
      padding-left: 10px;
    }
    @media screen and (max-width: 420px) {
     th, td {
      border: none;
    } 
  </style>  
<div class="row">
<div class="col s12">
  <div id="responsive" class="section scrollspy">
  <table class="striped responsive-table bordered">
    <thead class="green white-text">
      <th class="center">No.</th>
      <th>Berita</th>
      <th>Email</th>
      <th>Website</th>
      <th>Komentar</th>
      <th>Status</th>
      <th colspan="2" class="center">Tindakan</th>
    </thead>
    <tbody>
      @foreach ($data as $key => $value)
       @php
          $news = \App\Berita::find($value->komentar_berita_id);
        @endphp
        <tr>
          <td class="center">{{ $key + 1 }}.</td>
          <td>{{ $news->berita_judul }}</td>
          <td>{{ $value->komentar_email}}</td>
          <td>{{ $value->komentar_website }}</td>
          <td>{{ $value->komentar_isi }}</td>
          <td>{{ $value->komentar_status }}</td>
          <td>
            <a href="{{ url('comments/delete/'.$value->komentar_id) }}" class="red-text"><i class="material-icons left">delete</i>Hapus</a>
          </td>
          <td>
            @if ($value->komentar_status == "Aktif")
              <a href="{{ url('comments/deactivate/'.$value->komentar_id) }}" class="red-text"><i class="material-icons left">highlight_off</i>Nonaktifkan</a>
            @else
              <a href="{{ url('comments/activate/'.$value->komentar_id) }}" class="green-text"><i class="material-icons left">check_circle</i>Aktifkan</a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
@endsection
