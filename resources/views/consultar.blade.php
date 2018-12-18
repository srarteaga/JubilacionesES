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
      <center>
        <h4>Lista de Beneficiarios</h4>
        <div class="List-table">
          <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                <input id="txtCedula" type="text" placeholder="Cedula..." class="form-control col-mb-1 mr-sm-1 mb-sm-0" />
                <input id="txtName" type="text" placeholder="Nombre..." class="form-control col-mb-1 mr-sm-1 mb-sm-0" />
                <input id="txtLast" type="text" placeholder="Apellido..." class="form-control col-mb-1 mr-sm-1 mb-sm-0" />  
                <button id="btnSearch" type="button" class="btn btn-success">Buscar</button> &nbsp;
                <button id="btnClear" type="button" class="btn btn-danger">Cancelar</button>
              </form>
            </div>
          </div>
          <table id="grid"></table>
        </div>
      </center>
    </div>
  </div>
</div>
@endsection
