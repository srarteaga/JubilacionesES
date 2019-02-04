@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Registro</h4>
      </div>
    </div>
    <hr>
    <div id="app">
      <center>
          <h3>Punto de Cuenta</h3>
      </center>
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('Storejubilados')}}" method="POST">
            @csrf
            <hr>
            <hr>
            <div class="text-center">
              <button type="submit" class="btn btn-success btn-lg">Guardar</button>
              <button type="submit" class="btn btn-danger btn-lg">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection