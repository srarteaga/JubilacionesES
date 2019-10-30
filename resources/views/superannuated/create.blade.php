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
          <hr>
          <div class="form-group row">
            <label for="name" class="col-sm-2 text-right control-label col-form-label">Nombres</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
              @error('name')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Apellidos</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname">
              @error('lastname')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Cedula</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('identification') is-invalid @enderror" id="identification" name="identification">
              @error('identification')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Genero</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option disabled value="" selected>Seleccione un genero</option>
                @foreach($genders as $gender)
                  <option value="{{ $gender->code }}">{{ $gender->name }}</option>
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
              <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age">
              @error('age')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Antiguedad</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('antiquity') is-invalid @enderror" id="antiquity" name="antiquity">
              @error('antiquity')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Nomina</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('roster') is-invalid @enderror" id="roster" name="roster_id">
                <option disabled value="" selected>Seleccione tipo de nomina</option>
                @foreach($rosters as $roster)
                  <option value="{{ $roster->id }}">{{ $roster->name }}</option>
                @endforeach
              </select>
              @error('roster')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Razón</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('reason') is-invalid @enderror" id="reason" name="reason_id">
                <option disabled value="" selected>Seleccione una razón</option>
                @foreach($reasons as $reason)
                  <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                @endforeach
              </select>
              @error('reason')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <hr>
            <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Salario:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary">
              @error('salary')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-1 text-right control-label col-form-label">Monto:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control @error('rode') is-invalid @enderror" id="rode" name="rode">
              @error('rode')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-1 text-right control-label col-form-label">Porcentaje:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" name="percentage">
              @error('percentage')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Tipo de ente</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                <option disabled value="" selected>Seleccione categoria</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Ente</label>
            <div class="col-sm-3">
              <select class="custom-select form-control @error('reason') is-invalid @enderror" id="reason" name="reason_id" disabled>
                <option disabled value="" selected>Seleccione un ente</option>
              </select>
              @error('reason')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 text-right control-label col-form-label text-center">Observación:</label>
            <div class="col-sm-8 offset-2">
              <textarea type="text" class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation"></textarea>
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
              <input type="text" class="form-control @error('number_correspondecia') is-invalid @enderror" id="number_correspondecia" name="number_correspondecia">
              @error('number_correspondecia')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Fecha</label>
            <div class="col-sm-3">
              <input type="date" class="form-control @error('date_correspondencia') is-invalid @enderror" id="date_correspondencia" name="date_correspondencia">
              @error('date_correspondencia')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right control-label col-form-label">Numero VP</label>
            <div class="col-sm-3">
              <input type="text" class="form-control @error('number_vp') is-invalid @enderror" id="number_vp" name="number_vp">
              @error('number_vp')
                <sapn class="text-danger" >{{ $message }}</sapn>
              @enderror
            </div>
            <label class="col-sm-2 text-right control-label col-form-label">Fecha de recibido</label>
            <div class="col-sm-3">
              <input type="date" class="form-control @error('date_correspondencia_ent') is-invalid @enderror" id="date_correspondencia_ent" name="date_correspondencia_ent">
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