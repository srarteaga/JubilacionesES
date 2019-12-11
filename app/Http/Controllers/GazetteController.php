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
    public function create()
    {

        return view('gazette.create', 
        [
            'data' => Superannuated::WhereNull('gaceta')->get(),
        ]);

    }
    public function show($gaceta)
    {

        return view('gazette.show', 
        [
            'superannuated' => Superannuated::where('gaceta', $gaceta)->get(),
            'gaceta' => Superannuated::where('gaceta', $gaceta)->first(),
        ]);

    }
    public function store(Request $request)
    {
/*    	Cambiar la busquedar por 0 y por '' para que funcione el select multiple
		$datos = Superannuated::where('gaceta', 0)->get();
    	foreach ($datos as $value) {
        	$data = Superannuated::find($value->id);
	        $data->gaceta = null;
	        $data->date_gaceta = null;
	        $data->save();
        }
        */
/*       Funcion para reiniciar los valores de las gacetas a campo numerico sin punto
luego de correr esto cambiar en la base de dato de strin a integer 	
		$datos = Superannuated::where('gaceta', '!=', null)
   			->where('gaceta', '!=', 0)
   			->where('gaceta', '!=', '')
   			->get();
    	foreach ($datos as $value) {
        	$data = Superannuated::find($value->id);
	        $data->gaceta = str_replace(array('.', ','), '' , $data->gaceta);;
	        $data->save();
        }*/
        foreach ($request->superannuated as $value) {
        	$data = Superannuated::find($value);
	        $data->gaceta = $request->gaceta;
	        $data->date_gaceta = $request->date_gaceta;
	        $data->save();
        }

    }
    public function getGazette()
    {
   		$datas = Superannuated::
   			groupBy('gaceta')
   			->where('gaceta', '!=', null)
   			->where('gaceta', '!=', 0)
   			->where('gaceta', '!=', '')
            ->select('gaceta', DB::raw('count(gaceta) as total'));
        return datatables()->of($datas)
        ->addColumn('date', function ($data) {
        		$date = Superannuated::where('gaceta', $data->gaceta)->first();
                return date('d-m-Y', strtotime($date->date_gaceta));
            })
        ->addColumn('action', function ($data) {
                return '<a href="'.route("show.gazette",$data->gaceta).'" class="icono" title="Visualizar">
                    <b class="mdi mdi-eye radiusV"></b>
                  </a>
                  <a href="'.route("edit.superannuated",$data->gaceta).'" class="icono" title="Modificar">
                    <b class="mdi mdi-table-edit radiusM"></b>
                  </a> ';
            })
        ->make(true);

    }

}
