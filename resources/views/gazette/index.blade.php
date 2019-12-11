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
      <h4 class="text-center">Lista de Gacetas</h4>      
      <div class="row text-center pb-5 mr-auto ml-auto">
        <div class="col-md-12 pb-5">
          <table class="table-striped table-hover w-100" id="table2">
            <thead>
              <tr>
                <th class="text-center">Gaceta</th>
                <th class="text-center">Fecha de Gaceta</th>
                <th class="text-center">Cantidad de Jubilados</th>
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
    "language": {
      "url": "{{ asset('js/datatable-Spanish.json') }}"
    },
    "processing": true,
    "serverSide": true,
    "ajax": "{{ route('get.gazette') }}",
    "columns": [
      {data: 'gaceta'},
      {data: 'date', name:'date'},
      {data: 'total', name:'total'},
      {data: 'action', name: 'action', orderable: false, searchable: false}

    ],
    "columnDefs": 
    [
      { "searchable": true, "targets": 0},
      { "searchable": false, "targets": 1},
      { "searchable": false, "targets": 2},
      { "searchable": false, "targets": 3}
    ],
  });

</script>
@endsection

