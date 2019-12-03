@extends('layouts.app')
@section('content')
<div id="app"></div>
<div class="page-wrapper pb-5">
  <div class="page-breadcrumb pb-3">
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
          <input type="hidden" name="id" value="{{ $model->id }}">
          <hr>
          <div class="form-group row">
            <label for="name" class="col-sm-2 text-right control-label col-form-label">Nombres</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="name" value="{{ $model->name }}"  >
              @error('name')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Apellidos</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ $model->lastname }}">
              @error('lastname')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Cedula</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('identification') is-invalid @enderror" id="identification" name="identification" value="{{ $model->identification }}" >
              @error('identification')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Genero</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option disabled value="" selected>Seleccione un genero</option>
                @foreach($genders as $gender)
                  <option value="{{ $gender->code }}" {{ $model->gender == $gender->code ? 'selected' : '' }} >{{ $gender->name }}</option>
                @endforeach
              </select>
              @error('gender')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Edad</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ $model->age }}" >
              @error('age')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Antiguedad</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('antiquity') is-invalid @enderror" id="antiquity" name="antiquity" value="{{ $model->antiquity }}" >
              @error('antiquity')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Nomina</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('roster_id') is-invalid @enderror" id="roster" name="roster_id">
                <option disabled value="" selected>Seleccione tipo de nomina</option>
                @foreach($rosters as $roster)
                  <option value="{{ $roster->id }}" {{ $model->roster_id == $roster->id ? 'selected' : '' }} >{{ $roster->name }}</option>
                @endforeach
              </select>
              @error('roster_id')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Razón</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('reason_id') is-invalid @enderror" id="reason" name="reason_id">
                <option disabled value="" selected>Seleccione una razón</option>
                @foreach($reasons as $reason)
                  <option value="{{ $reason->id }}" {{ $model->reason_id == $reason->id ? 'selected' : '' }} >{{ $reason->name }}</option>
                @endforeach
              </select>
              @error('reason_id')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <hr>
            <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Salario:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ $model->salary }}" >
              @error('salary')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-1 text-right control-label col-form-label">Monto:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control @error('rode') is-invalid @enderror" id="rode" name="rode" value="{{ $model->rode }}" >
              @error('rode')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-1 text-right control-label col-form-label">Porcentaje:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" name="percentage" value="{{ $model->percentage }}" >
              @error('percentage')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Tipo de ente</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option disabled value="" selected>Seleccione categoria</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $model->entities->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Ente</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('entity_id') is-invalid @enderror" id="entity_id" name="entity_id">
                <option disabled value="" selected>Seleccione un ente</option>
                @foreach($entities as $entity)
                  <option value="{{ $entity->id }}" {{ $model->entity_id == $entity->id ? 'selected' : '' }} >{{ $entity->name }}</option>
                @endforeach
              </select>
              @error('entity_id')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 text-right control-label col-form-label text-center">Observación:</label>
            <div class="col-sm-8 offset-2">
              <textarea type="text" class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation">{{ $model->observation }}</textarea>
              @error('observation')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <hr>
          <h5 class="text-center">Datos de oficio</h5>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Numero</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('number_correspondecia') is-invalid @enderror" id="number_correspondecia" name="number_correspondecia" value="{{ $model->number_correspondecia }}">
              @error('number_correspondecia')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Fecha</label>
            <div class="col-sm-3">
              <input type="text" class="form-control datepicker @error('date_correspondencia') is-invalid @enderror" id="date_correspondencia" name="date_correspondencia" value="{{ date('d-m-Y', strtotime($model->date_correspondencia)) }}">
              @error('date_correspondencia')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Numero VP</label>
            <div class="col-sm-3">
              <input type="text" class="form-control  @error('number_vp') is-invalid @enderror" id="number_vp" name="number_vp" value="{{ $model->number_vp }}">
              @error('number_vp')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Fecha de recibido</label>
            <div class="col-sm-3">
              <input type="text" class="form-control datepicker @error('date_correspondencia_ent') is-invalid @enderror" id="date_correspondencia_ent" name="date_correspondencia_ent" value="{{ date('d-m-Y', strtotime($model->date_correspondencia_ent)) }}">
              @error('date_correspondencia_ent')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
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
@section('js')
<script type="text/javascript">
//Select Dependent
  $("#category_id").change(function(event){
   
    var id = $('#category_id').val()

    $.ajax({
      url: '{{ route('get.entity') }}',
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        id: id
      },
      success: function(response){
        if(response.length > 0){
          // $('#municipality_id').removeAttr('disabled');
          $("#entity_id").empty();
          $("#entity_id").append("<option value='0' disabled selected>Seleccione</option>");
          for(i=0; i<response.length; i++){
            $("#entity_id").append("<option value='"+response[i].id+ "'> "+response[i].name+"</option>");;
          }
        }
      }
    })
  });
</script>

@endsection