<!-- <h4>Register</h4>
<form action="{{ url('register') }}" method="post">
  {!! csrf_field() !!}
  <input type="text" name="user_name" value="{{ old('user_name') }}" placeholder="Username">
  @if ($errors->first('user_name') != '') {{ $errors->first('user_name') }} @endif
  <br>
  <input type="password" name="password" placeholder="Password">
  <br>
  <input type="text" name="nama" placeholder="Nama Lengkap">
  <br>
  <input type="text" name="user_email" placeholder="Email">
  @if ($errors->first('user_email') != '') {{ $errors->first('user_email') }} @endif
  <br>
  <button type="submit" name="button">Register</button>
</form> -->
@extends('lsp.layouts.design')

@section('content')
<title>Register</title>
<body onload="passhide()">
<div class="container">
     <div class="row" style="margin-top: 20px;">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content">
            <div class="row">
               <div class="col s12">
                  @if(session('success_reg'))
                  <div class="input-field col s12">
                    <div class="chip red white-text col s12 center">
                            {{ session('success_reg') }}
                    <i class="close material-icons">close</i>
                    </div>
                  </div>
                  @endif
                  @if(session('message'))
                  <div class="input-field col s12">
                    <div class="chip red white-text col s12 center">
                          {{ session()->pull('message') }}
                          <i class="close material-icons">close</i>
                      </div>
                    </div>
                      @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('register') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                        <div class="input-field col s12">
                             <i class="material-icons prefix">person</i>
                             <input id="username" type="text" name="user_name" class="validate" value="{{ old('username') }}" required autofocus>
                             <label for="username">Username</label>
                        </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                           <div class="input-field col s12">
                             <i class="material-icons prefix">person</i>
                             <input id="nama" type="text" name="nama" class="validate" value="{{ old('nama') }}" required autofocus>
                             <label for="nama">Nama Lengkap</label>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <div class="input-field col s12 m12">
                             <i class="material-icons prefix">lock</i><i class="material-icons right noselect" id="visibility" onclick="toggleType();" style="position: absolute;right: 0; margin-right: 10px;cursor: pointer;font-size: 27pt;color:#9e9e9e ">visibility</i>
                             <input id="password" name="password" type="password" class="validate" onkeyup="passhide()"required>
                             <label for="password">Password</label>
                         </div>
                           <div class="input-field col s12">
                             <i class="material-icons prefix">email</i>
                             <input id="email" type="text" name="user_email" class="validate" value="{{ old('user_email') }}" required autofocus>
                             <label for="email">Email</label>
                        </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                
                                <button type="submit" class="btn btn-primary col s12 m12">
                                Register
                                </button>
                                
                                <!-- <span class="hide-on-large-only col s12 m12" style="text-align: center;">Belum Memiliki Akun ? <a href="{{ url('/register') }}">Daftar Disini</a></span> -->
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
  function toggleType() {
    var obj = document.getElementById('password');
    if (obj.type == 'text') {
      document.getElementById("visibility").innerHTML = "visibility";
      document.getElementById("visibility").style.color = "#9e9e9e";
        obj.type = 'password';
    } else {
        obj.type = 'text';
        document.getElementById("visibility").innerHTML = "visibility_off";
        document.getElementById("visibility").style.color = "#f44336";
    }
}
function passhide() {
    var x = document.getElementById("password").value;
    if ($("#password").val() == "") {
        $("#visibility").hide();
    } else {
        $("#visibility").show();
    }
    
}
</script>
 <style type="text/css">
  .noselect {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
     user-select: none;
}
  .nana{
    width: 155px;
    margin-left: 50px;
  }
  #dropdown1{
    margin-top: 65px;
    margin-left: 18px;
  }
  .card{
    margin-left: 280px;
    margin-right: 280px;
  }
  .chip{
    border-radius: 0px;
  }
  @media only screen and (max-width: 992px) {
  .nana{
    width: 125px;
    margin-left: -0.5px;
  }
  #jas:hover{
    color: white;
  }
  .card{
    margin:0;
  }
  }
      </style>
@endsection
