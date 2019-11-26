@extends('layouts.app')
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
      <div class="row text-center pb-5 mr-auto ml-auto">
        <div class="col-md-12 pb-5">
          <table class="table-striped table-hover" id="table2">
            <thead>
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Nombre y Apellido</th>
                <th class="text-center">Nomina</th>
                <th class="text-center">Motivo</th>
                <th class="text-center">Ente</th>
                <th class="text-center">N° Oficio</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">N° Vp</th>
                <th class="text-center">Recibido</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Año</th>
                <th class="text-center" style="width: 60px !important;">opción</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">

  $('#table2').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{ route('get.superannuated') }}",
    "columns": [
      {data: 'id', visible:false},
      {data: 'identification'},
      {data: 'name', visible:false, name:'name'},
      {data: 'lastname', visible:false, name:'lastname'},
      {data: 'fullname', searchable:false},
      {data: 'roster', name: 'rosters.name'},
      {data: 'reason', name: 'reasons.name'},
      {data: 'entity', name: 'entities.name'},
      {data: 'number_correspondecia'},
      {data: 'date_correspondencia', visible:false},
      {data: 'number_vp'},
      {data: 'date_correspondencia_ent', visible:false},
      {data: 'status', name: 'status.name'},
      {data: 'year'},
      {data: 'action', name: 'action', orderable: false, searchable: false}

    ]
  });

</script>
@endsection

