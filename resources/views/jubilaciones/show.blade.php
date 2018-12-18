@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Jubilado N° {{ $model->id }}</h4>
      </div>
    </div>
  <hr>
  <div id="app">
    <div class="row justify-content-md-center">
      <div class="col-md-7">
        <h3 class="text-center">Datos del Beneficiario</h3>
        <table class="table table-borderless table-hover">
          <tbody>
            <tr >
              <th><b>Nombres:</b></th>
              <td>{{$model->nombre}}</td>
              <th><b>Apellidos:</b></th>
              <td>{{$model->apellido}}</td>
            </tr>
            <tr>
              <th><b>Cedula:</b></th>
              <td>{{$model->cedula}}</td>
              <th><b>Edad:</b></th>
              <td>{{$model->edad}}</td>
            </tr>
            <tr>
              <th><b>Genero:</b></th>
              <td>{{$model->genero}}</td>
              <th><b>Organismo:</b></th>
              <td>{{$model->jubiladoEnte->nombre_ente}}</td>
            </tr>
            <tr>
              <th><b>Nomina:</b></th>
              <td>{{$model->jubiladoNomina->nomina_tipo}}</td>
              <th><b>Estatus:</b></th>
              <td>{{$model->jubiladoEstatu->estado}}</td>
            </tr>
            <tr>
              <th><b>Antiguedad:</b></th>
              <td>{{$model->antiguedad}}</td>
              <th><b>Motivo:</b></th>
              <td>{{$model->jubiladoMotivo->nombre_motivo}}</td>
            </tr>
            <tr>
              <th><b>Sueldo:</b></th>
              <td>{{$model->sueldo_promedio}}</td>
              <th><b>monto:</b></th>
              <td>{{$model->monto}}</td>
            </tr>
            <tr>
              <th><b>Porcentaje:</b></th>
              <td>{{$model->porcentaje}}</td>
              <th><b>Año:</b></th>
              @if($model->año_registro)
              	<td>{{$model->año_registro}}</td>
              @else
              	<td>{{substr($model->created_at, 0, 4)}}</td>
              @endif
            </tr>
          </tbody>
          </table>
            @if($model->observacion)
              <hr>
              <table class="table table-borderless table-hover table-jubilado text-center">
                <tbody>
                  <tr>
                    <th><b>Observacion:</b></th>
                    <td>{{$model->observacion}}</td>
                  </tr>
                </tbody>
              </table>
              <hr>
            @endif
          <table class="table table-borderless table-hover table-jubilado">
            <tbody>
           		<tr>
                <th><b>N° de Oficio:</b></th>
                <td>{{$model->nu_oficio}}</td>
                <th><b>N° VP:</b></th>
                <td>{{$model->nu_vp}}</td>
              </tr>
              <tr>
                <th><b>Fecha de Oficio:</b></th>
                <td>{{$model->fecha_oficio}}</td>
                <th><b>Fecha recibido:</b></th>
                <td>{{$model->fecha_recibido}}</td>
              </tr>
              <tr>
                <th><b>Gaceta:</b></th>
                <td>Todavia no se a creado este modulo</td>
                <th><b>Fecha Gaceta:</b></th>
                <td>todavia no se a creado este modulo</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection