<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="{{url('../css/icon.css')}}" rel="stylesheet">
      <!--Import materialize.css-->
     <link href="{{url('../icon.png')}}" rel="shortcut icon" />
      <link type="text/css" rel="stylesheet" href="{{url('../materialize/css/materialize.min.css')}}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{url('../fa/css/font-awesome.min.css')}}"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <div class="navbar-fixed">
       <nav>
    <div class="nav-wrapper" style="background: #009688">
      <a href="{{url('/')}}" class="brand-logo no-user-select" style="font-family: Sketch;font-size: 45pt;margin-left: 12px;margin-top: 5px">
      <!-- <img src="{{url('../logo app.png')}}" style="max-width: 120px;margin-left: 20px;margin-top: 5px"> -->
      News
      </a>
      <ul class="right hide-on-med-and-down">
        @if (Auth::check())
        <li id="home" class=""><a href="{{url('/')}}"><i class="material-icons left">dashboard</i>Dashboard</a></li>
        <li><a href="{{ url('news') }}"><i class="material-icons left">chrome_reader_mode</i>Data Berita</a></li>
        <li id="buku" class=""><a href="{{ url('categories') }}"><i class="material-icons left">view_list</i></i>Daftar Kategori</a></li>
        <li><a href="{{ url('comments') }}"><i class="material-icons left">comment</i>Komentar</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown0"><i class="material-icons left">person_pin</i> {{Auth::user()->user_namalengkap}} <i class="material-icons right">arrow_drop_down</i></a></li>
        <ul id="dropdown0" style="font-family:segoe UI;" class="dropdown-content">
        <li><a href="{{ url('users') }}"><i class="material-icons left">account_box</i>Akun</a></li>
        <li><a href="{{ url('logout') }}" class="waves-effect waves-light"><i class="material-icons left">exit_to_app</i>Keluar</a></li>
      @else
        <li id="home" class=""><a href="{{url('/')}}"><i class="material-icons left">dashboard</i>Dashboard</a></li>
        <li id="home" class=""><a href="{{url('/login')}}"><i class="material-icons left">input</i>Login</a></li>
        <li id="home" class=""><a href="{{url('/register')}}"><i class="material-icons left">person_add</i>Register</a></li>
      @endif
    <!-- <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form> -->  
      </ul>
      </ul>
    </div>
  </nav>
  </div>
     <body style="background:#F5F8FA">
            @yield('content')
      <script type="text/javascript" src="{{url('../js/jquery-2.1.1.min.js')}}"></script>
      <script type="text/javascript" src="{{url('../materialize/js/materialize.min.js')}}"></script>
    </body>
  </html>

    <script type='text/javascript'>
     $(document).ready(function() {
    $('select').material_select();
  });
          
$('img').bind('contextmenu', function(e){
    return false;
});
</script>

<style type="text/css">
   #dropdown0{
          margin-top: 65px;
          /*margin-left: 18px;*/
        }
    .judul{
      cursor:pointer; 
      font-size: 12pt;
      padding: 4px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow:ellipsis;
      background: #009688;
    }
    a{
        color: black;
      }
    .drop{
      color: #009688;
    }
    .fixed-action-btn{
    margin-right: 15px;
    }
    .ba i{
     margin-right: 10px;
     margin-left: -1px;
     float: left;
    }
    .ba{
      cursor: pointer;
      /*font-size: 10pt;*/
    }
    .card-title{
      margin-top: 20px;
    }
    .pa{
      padding: 10px;
      border-radius: 5px;
    }
     @media screen and (max-width: 420px) {
      .ema{
      white-space: nowrap;
      overflow: hidden;
      text-overflow:ellipsis;
      width: 100px;
    }
  }
</style>