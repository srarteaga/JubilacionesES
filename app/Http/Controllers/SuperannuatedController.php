<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superannuated;

class SuperannuatedController extends Controller
{
    
    public function index()
    {
       //$jubilado = Jubilado::orderBy('id', 'DESC')->get();
        return view('superannuated.index');

    }

    public function create()
    {
        return view('jubilaciones.register', [
            'superannuated' => Superannuated::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Superannuated $id)
    {
        
/*        $jubilado = Jubilado::orderBy('id', 'DESC')->get();

        foreach ($jubilado as $value) {
           $data=Jubilado::where('id', $value->id)->first();


           if ($data->date_correspondencia!=0) {
            $data->date_correspondencia=date('Y-m-d H:i:s', $data->date_correspondencia);
           }
           else{
                $data->date_correspondencia=null;
           }

            if ($data->status_date!=0) {
            $data->status_date=date('Y-m-d H:i:s', $data->status_date);
           }
           else{
                $data->status_date=null;
           }

            if ($data->user_date!=0) {
            $data->user_date=date('Y-m-d H:i:s', $data->user_date);
           }
           else{
                $data->user_date=null;
           }


           if ($data->date_gaceta!=0 || $data->date_gaceta != null) {
            $data->date_gaceta=date('Y-m-d H:i:s', $data->date_gaceta);
           }
           else{
                $data->date_gaceta=null;
           }

           if ($data->date_correspondencia_ent!=0) {
            $data->date_correspondencia_ent=date('Y-m-d H:i:s', $data->date_correspondencia_ent);
           }
           else{
                $data->date_correspondencia_ent=null;
           }
           $data->save();


        }*/

        return view('superannuated.show', [
            'model' => $id
        ]);
    }
    public function getSuperannuated()
    {
/*    	$data = Superannuated::join('reasons', 'superannuated.reason_id', '=', 'reasons.id')
            ->selectRaw('CONCAT(superannuated.name, " ", superannuated.lastname) as fullname, superannuated.id, reasons.name as reason, superannuated.identification, superannuated.roster_id, superannuated.entity_id, superannuated.number_correspondecia, superannuated.date_correspondencia, superannuated.number_vp, superannuated.date_correspondencia_ent, superannuated.status_id, superannuated.number_vp');

        return datatables()->of($data)->toJson();
*/


   		$datas = Superannuated::join('reasons', 'superannuated.reason_id', '=', 'reasons.id')
   			->join('rosters', 'superannuated.roster_id', '=', 'rosters.id')
   			->join('status', 'superannuated.status_id', '=', 'status.id')
   			->join('entities', 'superannuated.entity_id', '=', 'entities.id')
            ->select('superannuated.name', 'superannuated.lastname', 'superannuated.id', 'reasons.name as reason', 'superannuated.identification', 'rosters.name as roster', 'entities.name as entity', 'superannuated.number_correspondecia', 'superannuated.date_correspondencia', 'superannuated.number_vp', 'superannuated.date_correspondencia_ent', 'status.name as status', 'superannuated.number_vp', 'superannuated.year');

        return datatables()->of($datas)
        ->addColumn('fullname', function ($data) {
                return $data->name.' '.$data->lastname;
            })
        ->addColumn('action', function ($data) {
                return '<a href="'.route("show.superannuated",$data->id).'" class="icono" title="Visualizar">
                    <b class="mdi mdi-eye radiusV"></b>
                  </a>
                  <a href="'.route("show.superannuated",$data->id).'" class="icono" title="Modificar">
                    <b class="mdi mdi-table-edit radiusM"></b>
                  </a> 
                  <a  href="#" class="icono" title="Eliminar" data-target="#Deleted" data-toggle="modal" data-id="deleteCliente/{{$ver->id}}">
                    <b class="mdi mdi-delete-forever radiusE"></b>
                  </a>';
            })
        ->make(true);

    }
}

