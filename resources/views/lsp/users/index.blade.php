  @extends('lsp.layouts.design')
@section('content')
<title>Daftar Akun</title>
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
      <th>Nama</th>
      <th>Username</th>
      <th>Email</th>
      <th>Status</th>
      <th class="center">Tindakan</th>
    </thead>
    <tbody>
      @foreach ($data as $key => $value)
       @php
          $news = \App\Berita::find($value->komentar_berita_id);
        @endphp
        <tr>
          <td class="center">{{ $key + 1 }}.</td>
          <td>{{ $value->user_namalengkap }}</td>
          <td>{{ $value->user_name }}</td>
          <td>{{ $value->user_email }}</td>
          <td>{{ $value->user_status }}</td>
          <td>
            @if ($value->user_status == 'Tidak Aktif')
              <a href="{{ url('users/activate/' . $value->user_name) }}"  class="green-text"><i class="material-icons left">check_circle</i>Aktifkan</a>
            @else
              <a href="{{ url('users/deactivate/' . $value->user_name) }}" class="red-text"><i class="material-icons left">highlight_off</i>Nonaktifkan</a>
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
