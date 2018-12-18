<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('img/bandera.png') }}" type="image/x-icon">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('', 'Jubilaciones Especiales') }}</title>
  <!-- Styles -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('img/bandera.png') }}" rel="icon">
  <script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
  </script>
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url({{ asset('img/banner.jpg') }});">
          <span class="login100-form-title-1">Iniciar sesión</span>
        </div>
        <form class="login100-form" role="form" method="POST" action="{{ url('/sesion') }}">
          {{ csrf_field() }}
          <div class="wrap-input100 validate-input m-b-26">
            <span class="label-input100">Usuario</span>
            <input class="input100" type="text" placeholder="Ingrese el usuario" name="user" id="user">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-18">
            <span class="label-input100">Contraseña</span>
            <input class="input100" type="password" placeholder="Ingrese la contraseña" id="pass" name="pass">
            <span class="focus-input100"></span>
          </div>
          <div class="row">
            <div class="col-md-12 text-center desvanecer">
              @if(session()->has('msj'))
                <div class="col-md-12  alert alert-warning" >
                  {{session('msj')}}
                </div>
              @endif
              @if(session()->has('errormsj'))
                <div class="col-md-12  alert alert-danger" >
                  {{session('errormsj')}}
                </div>
              @endif
            </div>
          </div>
          <div class="flex-sb-m w-full p-b-30">
            <!--<div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div>-->
            <div>
              <a href="#" class="txt1">¿Olvido su contraseña?</a>
            </div>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Entrar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>