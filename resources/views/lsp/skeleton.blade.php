<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Berita</title>
  </head>
  <body>
    @if (Auth::check())
      <a href="{{ url('/') }}">Beranda</a>
      <a href="{{ url('categories') }}">Kategori</a>
      <a href="{{ url('news') }}">Berita</a>
      <a href="{{ url('comments') }}">Komentar</a>
      <a href="{{ url('users') }}">User</a>
      <a href="{{ url('logout') }}">Logout</a>
    @else
      <a href="{{ url('register') }}">Register</a>
      <a href="{{ url('login') }}">Login</a>
    @endif
    <br>
    <div class="bg_heart">
</div>


    @yield('content')
  </body>
</html>
