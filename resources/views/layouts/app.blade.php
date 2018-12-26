<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/bandera.png') }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('', 'Jubilaciones Especiales') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('img/bandera.png') }}" rel="icon">
  <link href="{{ asset('css/float-chart.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
</head>
<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper">
          @yield('content')
  </div>
  @extends('layouts.folder')

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="../libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="../libs/sparkline/sparkline.js"></script>
  <!--Wave Effects -->
  <script src="../js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="../js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="../js/custom.min.js"></script>
  <script src="../libs/flot/excanvas.js"></script>
  <script src="../libs/flot/jquery.flot.js"></script>
  <script src="../libs/flot/jquery.flot.pie.js"></script>
  <script src="../libs/flot/jquery.flot.time.js"></script>
  <script src="../libs/flot/jquery.flot.stack.js"></script>
  <script src="../libs/flot/jquery.flot.crosshair.js"></script>
  <script src="../libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="../js/pages/chart/chart-page-init.js"></script>
    <script src="{{ asset('js/misfunciones.js') }}"></script>

</body>
</html>
