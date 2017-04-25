@extends('lsp.layouts.design')
@section('content')
<title>Kategori</title>
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
      <th class="center">No</th>
      <th>Nama</th>
      <th>Status</th>
      <th>Tanggal Input</th>
      <th>Penulis</th>
      <th colspan="3" class="center">Tindakan</th>
    </thead>
    <tbody>
      @foreach ($data as $key => $value)
        <tr>
          <td class="center">{{ $key + 1 }}.</td>
          <td>{{ $value->kategori_nama }}</td>
          <td>{{ $value->kategori_status}}</td>
          <td>{{ $value->kategori_tglinput }}</td>
          <td>{{ $value->kategori_userinput }}</td>
          <td>
           <a href="{{ url('categories/edit/'.$value->kategori_id) }}" class="blue-text"> <i class="material-icons left">edit</i>Ubah</a>
          </td>
          <td>
            <a href="{{ url('categories/delete/'.$value->kategori_id) }}" class="red-text"><i class="material-icons left">delete</i>Hapus</a>
          </td>
          <td>
            @if ($value->kategori_status == "Aktif")
              <a href="{{ url('categories/deactivate/'.$value->kategori_id) }}" class="red-text"><i class="material-icons left">highlight_off</i>Nonaktifkan</a>
            @else
              <a href="{{ url('categories/activate/'.$value->kategori_id) }}" class="green-text"><i class="material-icons left">check_circle</i>Aktifkan</a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
   <div class="fixed-action-btn">
    <a class="btn-floating btn-large red tooltipped" href="{{ url('categories/create') }}" data-position="top" data-delay="50" data-tooltip="Tambah Kategori">
      <i class="large material-icons">mode_edit</i>
    </a>
  </div>
</div>
</div>
@endsection
