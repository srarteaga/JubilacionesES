@extends('layouts.app')
@section('content')
<div id="app"></div>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Registrar jubilación especial</h4>
      </div>
    </div>
    <hr>
    <center>
        <h3>Datos del Beneficiario</h3>
    </center>
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('store.superannuated')}}" method="POST">
          @csrf
          <hr>
          <div class="form-group row">
            <label for="name" class="col-sm-2 text-right control-label col-form-label">Nombres</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            </div>
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            <label class="col-sm-2 text-right control-label col-form-label">Apellidos</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Cedula</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="identification" name="identification">
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Genero</label>
            <div class="col-sm-3">
              <select class="custom-select form-control" id="gender" name="gender">
                <option disabled value="" selected>Seleccione un genero</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Edad</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="age" name="age">
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Antiguedad</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="antiquity" name="antiquity">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Nomina</label>
            <div class="col-sm-3">
              <select class="custom-select form-control" id="roster" name="roster_id">
                <option disabled value="" selected>Seleccione tipo de nomina</option>
                @foreach($rosters as $roster)
                  <option value="{{ $roster->id }}">{{ $roster->name }}</option>
                @endforeach
              </select>
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Razón</label>
            <div class="col-sm-3">
              <select class="custom-select form-control" id="reason" name="reason_id">
                <option disabled value="" selected>Seleccione un genero</option>
                @foreach($reasons as $reason)
                  <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <hr>
            <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Salario:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="salary" name="salary">
            </div>
            <label class="col-sm-1 text-right control-label col-form-label">Monto:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="rode" name="rode">
            </div>
            <label class="col-sm-1 text-right control-label col-form-label">Porcentaje:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="percentage" name="percentage">
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success btn">Guardar</button>
            <button type="submit" class="btn btn-danger btn">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection