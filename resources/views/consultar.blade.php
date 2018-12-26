@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Consultar</h4>
      </div>
    </div>
    <hr>
    <div id="app" class="separar">
      <h4 class="text-center">Lista de Beneficiarios</h4>      
      <div class="row text-center">
        <div class="col-md-12">
          <table class="table-striped table-bordered table-hover" id="tablaT1">
            <thead>
              <tr>
                <th class="text-center" hidden>id</th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Edad</th>
                <th class="text-center">Nomina</th>
                <th class="text-center">Motivo</th>
                <th class="text-center">Ente</th>
                <th class="text-center">N° Oficio</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">N° Vp</th>
                <th class="text-center">Recibido</th>
                <th class="text-center">Punto</th>



                <th class="text-center">Estatus</th>
                <th class="text-center">opción</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jubilado as $ver)
                <tr class="text-center">
                        <td class="text-center" hidden> {{$ver->id}}</td>
                        <td class="text-center"> {{$ver->cedula}}</td>
                        <td class="text-center"><a href="#" hidden>{{$ver->id}}</a><a href="jubilado/{{$ver->id}}">{{$ver->nombre}} {{ $ver->apellido }}</a></td>
                        <td class="text-center"> {{$ver->edad}}</td>
                        <td class="text-center"> {{$ver->jubiladoNomina->nomina_tipo}}</td>
                        <td class="text-center"> {{$ver->jubiladoMotivo->nombre_motivo}}</td>
                        <td class="text-center"> {{$ver->jubiladoEnte->nombre_ente}}</td>
                        <td class="text-center"> {{$ver->nu_oficio}}</td>
                        <td class="text-center"> {{$ver->fecha_oficio}}</td>
                        <td class="text-center"> {{$ver->nu_vp}}</td>
                        <td class="text-center"> {{$ver->fecha_recibido}}</td>
                        @isset($ver->id_punto_cuenta)
                          <td class="text-center"> POR DESARROLAR</td>
                        @else
                          <td class="text-center">Sin punto</td>
                        @endisset
                        <td class="text-center"> {{$ver->jubiladoEstatu->estado}}</td>
                  <td class="text-center">
                  
                  <a href="jubilado/{{$ver->id}}" class="icono" title="Visualizar">
                    <b class="mdi mdi-eye radiusV"></b>
                  </a>
                  <a href="{{url ('rutaCliente/'.$ver->id) }}/edit" class="icono" title="Modificar">
                    <b class="mdi mdi-table-edit radiusM"></b>
                  </a> 
                  <a  href="#" class="icono" title="Eliminar" data-target="#Deleted" data-toggle="modal" data-id="deleteCliente/{{$ver->id}}">
                    <b class="mdi mdi-delete-forever radiusE"></b>
                  </a>
                  </td>                       
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
