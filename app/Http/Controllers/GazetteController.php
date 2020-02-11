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
            'data' => Superannuated::where('status_id','!=', 2)->where('status_id','!=', 3)->WhereNull('gaceta')->get(),
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

        $this->validator($request);

        foreach ($request->superannuated as $value) {
        	$data = Superannuated::find($value);
	        $data->gaceta = $request->gaceta;
	        $data->date_gaceta = $request->date_gaceta;
	        $data->save();
        }

    }

    private function validator( $data ){
        
        return $this->validate( $data, [
            'gaceta' => 'required|digits_between:3,10',
            'date_gaceta' => 'required|date',
            'superannuated' => 'required|array'
        ], [
            'required' => 'Este campo es requerido',
            'max' => 'El campo no debe contener más de :max caracteres.',
            'min' => 'El campo debe tener un minimo de :min caracteres',
            'digits_between' => 'El campo debe contener entre :min y :max dígitos.',
            'date' => 'El campo no corresponde con una fecha válida.',
            'identification.unique' => 'Esta cedula ya se encuentra registrada',
            'between' => 'El campo debe tener un valor entre :min y :max.',
            'numeric' => 'El campo debe ser un numero.',
            'superannuated.required' => 'Debe seleccionar al menos un beneficiario para completar el registro'

        ]);
    }

    public function edit($gazette)
    {
      return view('gazette.edit', 
        [
            'superannuated' => Superannuated::where('gaceta', $gazette)->get(),
            'gazette' => Superannuated::where('gaceta', $gazette)->first(),
            'data' => Superannuated::where('status_id','!=', 2)->where('status_id','!=', 3)->WhereNull('gaceta')->get(),
        ]);
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
                  <a href="'.route("edit.gazette",$data->gaceta).'" class="icono" title="Modificar">
                    <b class="mdi mdi-table-edit radiusM"></b>
                  </a> ';
            })
        ->make(true);

    }

}
