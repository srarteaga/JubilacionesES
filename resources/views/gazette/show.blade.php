@extends('layouts.app')
@section('content')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Gaceta N° {{ $gaceta->gaceta }} - Fecha {{ $gaceta->date_gaceta }}</h4>
      </div>
    </div>
  <hr>
  <div id="app">
    <div class="justify-content-md-center">
      <center>
        <h5 class="text-center">Lista de Beneficiarios de la Gaceta N° {{ $gaceta->gaceta }}</h5>
      </center>
      <table class="table-striped table-hover w-100" id="tablaT1">
        <thead>
          <tr>
            <th class="text-center">Nombre y Apellido</th>
            <th class="text-center">Motivo</th>
            <th class="text-center">Ente</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Año</th>
            <th class="text-center">opción</th>
          </tr>
        </thead>
        <tbody>
          @foreach($superannuated as $row)
            <tr class="tbody">
              <td>{{$row->name}} {{ $row->lastname }}</td>
              <td>{{$row->reasons->name}}</td>
              <td>{{$row->entities->name}}</td>
              <td>{{$row->status->name}}</td>
              <td>{{$row->year}}</td>
              <td>
                <a href="{{ route("show.superannuated",$row->id) }}" class="icono" title="Visualizar">
                  <b class="mdi mdi-eye radiusV"></b>
                </a>
                <a href="{{ route("edit.superannuated",$row->id) }}" class="icono" title="Modificar">
                  <b class="mdi mdi-table-edit radiusM"></b>
                </a>
                <a  href="#" class="icono" title="Eliminar" data-target="#Deleted" data-toggle="modal" data-id="deleteCliente/{{$row->id}}">
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
@endsection