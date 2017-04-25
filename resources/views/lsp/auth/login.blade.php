@extends('lsp.layouts.design')

@section('content')
<title>Login</title>
<body onload="passhide()">
<div class="container">
     <div class="row" style="margin-top: 20px;">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content">
            <div class="row">
               <div class="col s12">
                  @if(session('messagee'))
                  <div class="input-field col s12">
                    <div class="chip green white-text col s12 center">
                            {{ session('messagee') }}
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                        <div class="input-field col s12">
                             <i class="material-icons prefix">person</i>
                             <input id="username" type="text" name="username" class="validate" value="{{ old('username') }}" required autofocus>
                             <label for="username">Username</label>
                        </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <div class="input-field col s12 m12">
                             <i class="material-icons prefix">lock</i><i class="material-icons right noselect" id="visibility" onclick="toggleType();" style="position: absolute;right: 0; margin-right: 10px;cursor: pointer;font-size: 27pt;color:#9e9e9e ">visibility</i>
                             <input id="password" name="password" type="password" class="validate" onkeyup="passhide()"required>
                             <label for="password">Password</label>
                             
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
                                Login
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
