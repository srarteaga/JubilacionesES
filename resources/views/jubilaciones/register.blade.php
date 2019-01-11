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
          <h3>Datos del Beneficiario</h3>
      </center>
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('Storejubilados')}}" method="POST">
            @csrf
            <hr>
            <div class="form-group row">
              <label class="col-sm-2 text-right control-label col-form-label-lg">Nombre</label>
              <div class="col-md-3">
                <input type="text" class="form-control form-control-lg" id="nombre" name="nombre">
              </div>
              <label class="col-sm-3 text-right control-label col-form-label-lg">Apellido</label>
              <div class="col-md-3">
                <input type="text" class="form-control form-control-lg" id="apellido" name="apellido">
              </div>
              <label class="col-sm-2 text-right control-label col-form-label-lg">Cedula</label>
              <div class="col-md-3">
                <input type="text" class="form-control form-control-lg" id="cedula" name="cedula">
              </div>
              <label class="col-sm-3 text-right control-label col-form-label-lg">Edad</label>
              <div class="col-md-3">
                <input type="text" class="form-control form-control-lg" id="edad" name="edad">
              </div>
              <label class="col-sm-2 text-right control-label col-form-label-lg">Genero</label>
              <div class="col-md-3">
                <select class="custom-select custom-select-lg" id="genero" name="genero">
                  <option selected>Seleccione...</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
              </div>
              <label class="col-sm-3 text-right control-label col-form-label-lg">Nomina</label>
              <div class="col-md-3">
                <select id="nomina_id" type="text" class="custom-select custom-select-lg" name="nomina_id">
                  @if(!old('Nomina'))
                    <option disabled selected>Seleccione...</option>
                  @endif
                  @foreach($Nomina as $model)
                    <option value="{{$model->id}}" {{old('id') == $model->id? 'selected' : ''}}>{{$model->nomina_tipo}}</option>
                  @endforeach
                </select>
              </div>
              <label class="col-sm-2 text-right control-label col-form-label-lg">Antiguedad</label>
              <div class="col-md-3">
                <input type="text" class="form-control form-control-lg" placeholder="Años" id="antiguedad" name="antiguedad">
              </div>

              <label class="col-sm-3 text-right control-label col-form-label-lg">Motivo</label>
              <div class="col-md-3">
                <select class="custom-select custom-select-lg" id="motivo_id" name="motivo_id">
                  @if(!old('Motivo'))
                    <option disabled selected>Seleccione...</option>
                    @endif
                    @foreach($Motivo as $model)
                      <option value="{{$model->id}}" {{old('id') == $model->id? 'selected' : ''}}>{{$model->nombre_motivo}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <label class="col-sm-3 text-right control-label col-form-label-lg">Sueldo Promedio</label>
                <input type="text" class="form-control form-control-lg col-md-1" placeholder="Bs" id="sueldo_promedio" name="sueldo_promedio">
              <label class="col-sm-2 text-right control-label col-form-label-lg">Monto Aprobado</label>
                <input type="text" class="form-control form-control-lg col-md-1" placeholder="Bs" id="monto" name="monto">
              <label class="col-sm-2 text-right control-label col-form-label-lg">Porcentaje</label>
                <input type="text" class="form-control form-control-lg col-md-1" placeholder="%" id="porcentaje" name="porcentaje">
            </div>
            <hr>
            <div class="row">
              <label class="col-sm-2 text-right control-label col-form-label-lg">Organismo</label>
              <div class="col-md-10">
                <organismos></organismos>
              </div>

              <label class="col-sm-3 text-right control-label col-form-label-lg">Observación</label>
              <div class="col-md-9">
                <textarea class="form-control form-control-lg col-md-8" id="observacion" name="observacion"></textarea>
              </div>
            </div>
            <hr>
            <h4 class="text-center">Datos de oficio</h4>
            <div class="form-group row">
              <label class="col-sm-2 text-right control-label col-form-label-lg">N° de oficio</label>
                <div class="col-md-3">
                  <input type="text" class="form-control form-control-lg" id="nu_oficio" name="nu_oficio">
                </div>
              <label class="col-sm-3 text-right control-label col-form-label-lg">N° VP</label>
              <div class="col-md-3">
                <input type="text" class="form-control form-control-lg" id="nu_vp" name="nu_vp">
              </div>
              <label class="col-sm-2 text-right control-label col-form-label-lg">Fecha de oficio</label>
              <div class="col-md-3">
                <input class="form-control form-control-lg datepicker" id="fecha_oficio" name="fecha_oficio">
              </div>
              <label class="col-sm-3 text-right control-label col-form-label-lg">Fecha de recibo</label>
              <div class="col-md-3">
                <input class="form-control form-control-lg datepicker" id="fecha_recibido" name="fecha_recibido">
              </div>
            </div>
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