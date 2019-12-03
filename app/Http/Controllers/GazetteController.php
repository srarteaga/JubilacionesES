<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superannuated;
use DB;

class GazetteController extends Controller
{
    public function index()
    {
        return view('gazette.index');

    }
    public function getGazette()
    {
   		$datas = Superannuated::
   			groupBy('gaceta')
   			->where('gaceta', '!=', '')
   			->where('gaceta', '!=', 0)
            ->select('gaceta', DB::raw('count(gaceta) as total'));
        return datatables()->of($datas)
        ->addColumn('date', function ($data) {
        		$date = Superannuated::where('gaceta', $data->gaceta)->first();
                return $date->date_gaceta;
            })
        ->addColumn('action', function ($data) {
                return '<a href="'.route("show.superannuated",$data->gaceta).'" class="icono" title="Visualizar">
                    <b class="mdi mdi-eye radiusV"></b>
                  </a>
                  <a href="'.route("edit.superannuated",$data->gaceta).'" class="icono" title="Modificar">
                    <b class="mdi mdi-table-edit radiusM"></b>
                  </a> 
                  <a  href="#" class="icono" title="Eliminar" data-target="#Deleted" data-toggle="modal" data-id="deleteCliente/{{$ver->id}}">
                    <b class="mdi mdi-delete-forever radiusE"></b>
                  </a>';
            })
        ->make(true);

    }

}
