@extends('layouts.app')
@section('css')
  <link href="{{ asset('css/multi-select.dist.css') }}" rel="stylesheet">
  <style type="text/css">
    .ms-list{
      height: 50vh !important;
    }
  </style>
@endsection
@section('content')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Registrar nueva gaceta</h4>
      </div>
    </div>
    <hr>
    <center>
        <h3>Datos de la Gaceta</h3>
    </center>
    <div id="app" class="separar">
      <form action="{{route('store.gazette')}}" method="POST">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 text-right control-label col-form-label">Numero de Gaceta</label>
          <div class="col-sm-3">
            <input type="text" class="form-control @error('gaceta') is-invalid @enderror" id="gaceta" name="gaceta" value="{{ old('gaceta') }}">
            @error('gaceta')
              <sapn class="text-danger" >{{ $message }}</sapn>
            @enderror
          </div>
          <label class="col-sm-2 text-right control-label col-form-label">Fecha de Gaceta</label>
          <div class="col-sm-3">
            <input type="text" class="form-control datepicker @error('date_gaceta') is-invalid @enderror" id="date_gaceta" name="date_gaceta" value="{{ old('date_gaceta') }}">
            @error('date_gaceta')
              <sapn class="text-danger" >{{ $message }}</sapn>
            @enderror
          </div>
        </div>
        <h4 class="text-center">Selecione los Beneficiados</h4>      
        <div class="row text-center pb-5 mr-auto ml-auto">
          <select id='custom-headers' class="searchable" multiple='multiple' name="superannuated[]">
            <optgroup label='Beneficiarios'>
              @php $valor = 1 @endphp
            @foreach($data as $row)
            <option value='{{ $row->id }}'>{{ $valor++ }}-{{ $row->name }} {{ $row->lastname }} - CI: {{ $row->identification }} </option>
            @endforeach
          </optgroup>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-success btn">Guardar</button>
          <button type="submit" class="btn btn-danger btn">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('js/jquery.quicksearch.js') }}"></script>
<script type="text/javascript">

$('.searchable').multiSelect({
  cssClass: 'w-100',
  selectableHeader: "<input type='text' class='search-input w-100' autocomplete='off' placeholder='Buscador'>",
  selectionHeader: "<input type='text' class='search-input w-100' autocomplete='off' placeholder='Buscador'>",
  afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});

</script>
@endsection

