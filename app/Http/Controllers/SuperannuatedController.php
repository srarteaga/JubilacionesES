<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Superannuated;
use App\Roster;
use App\Reason;
use App\CategoryEntity;
use App\Gender;
use App\Entity;


class SuperannuatedController extends Controller
{
    
    public function index()
    {
       //$jubilado = Jubilado::orderBy('id', 'DESC')->get();
        return view('superannuated.index');

    }

    public function create()
    {
        return view('superannuated.create', [
            'rosters' => Roster::all(),
            'reasons' => Reason::all(),
            'categories' => CategoryEntity::all(),
            'genders' => Gender::all()
        ]);
    }
    public function edit(Superannuated $id)
    {
      return view('superannuated.edit', [
            'model' => $id,
            'categories' => CategoryEntity::all(),
            'entities' => Entity::where('category_id', $id->entities->category_id)->get(),
            'genders' => Gender::all(),
            'rosters' => Roster::all(),
            'reasons' => Reason::all(),

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
    public function store(Request $request)
    {
        $this->validator($request);
        $id = $request->input('id');
        $data = Superannuated::firstOrNew(['id' => $id]);
        $data->fill($request->all());
        $data->save();

        return redirect('superannuated/show/'.$data->id.'');
    }
    private function validator( $data ){
        
        return $this->validate( $data, [
            'name' => 'required|max:40',
            'lastname' => 'required|max:40',
            'identification' => 'required|digits_between:5,9|unique:superannuated,identification,'.$data->id,
            'gender' => 'required',
            'age' => 'required|digits_between:1,2',
            'antiquity' => 'required|digits_between:1,2',
            'roster_id' => 'required',
            'reason_id' => 'required',
            'category_id' => 'required',
            'entity_id' => 'required',
            'salary' => 'numeric|required|between:100,99999999999999.99',
            'rode' => 'numeric|required|between:100,99999999999999.99',
            'percentage' => 'numeric|between:1,100',
            'observation' => 'nullable|max:255|min:5',
            'number_correspondecia' => 'nullable|digits_between:1,20',
            'date_correspondencia' => 'nullable|date',
            'number_vp' => 'nullable|digits_between:1,20',
            'date_correspondencia_ent' => 'nullable|date',

        ], [
            'required' => 'Este campo es requerido',
            'max' => 'El campo no debe contener más de :max caracteres.',
            'digits_between' => 'El campo debe contener entre :min y :max dígitos.',
            'date' => 'El campo no corresponde con una fecha válida.',
            'identification.unique' => 'Esta cedula ya se encuentra registrada',
            'between' => 'El campo debe tener un valor entre :min y :max.',
            'numeric' => 'El campo debe ser un numero.',

        ]);
    }

    public function getSuperannuated()
    {
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
                  <a href="'.route("edit.superannuated",$data->id).'" class="icono" title="Modificar">
                    <b class="mdi mdi-table-edit radiusM"></b>
                  </a> 
                  <a  href="#" class="icono" title="Eliminar" data-target="#Deleted" data-toggle="modal" data-id="deleteCliente/{{$ver->id}}">
                    <b class="mdi mdi-delete-forever radiusE"></b>
                  </a>';
            })
        ->make(true);

    }
}

