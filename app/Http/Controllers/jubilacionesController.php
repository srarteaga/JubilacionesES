<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jubilado;
use App\Nomina;
use App\Motivo;
use App\Ente;
use App\Categoria_ente;

class jubilacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$jubilado = Jubilado::orderBy('id', 'DESC')->get();
        return view('jubilaciones.index'|);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jubilaciones.register', [
            'Jubilados' => Jubilado::all(),
            'Nomina' => Nomina::all(),
            'Motivo' => Motivo::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        try {
            $data = collect($request->all());
            $data = $data->put('estatus_id', '0')->toArray();
            $data = array_add($data, 'id_user', $_SESSION['id']);
            Jubilado::create($data);
            return redirect()->to('consultar');
        } catch (Exception $e) {
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jubilado $id)
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

        return view('jubilaciones.show', [
            'model' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEntes()
    {
            
        $models = Ente::all();


        foreach ($models as $i => $model) {
            
            $data[$i++] = ['id'=>$model->id, 'nombre_ente'=>$model->nombre_ente, 'categoria'=> $model->CategoriaType->categoria ];
   
        }

        return $data;
    }
    
    public function getCategorias()
    {
        return Categoria_ente::orderBy('categoria', 'ASC')->get();
    }

    public function getList()
    {
   
        $models = Jubilado::orderBy('id', 'DES')->get();

        foreach ($models as $i => $model) {
            
            $data[$i++] = ['id'=>$model->id, 'cedula'=>$model->cedula, 'nombre'=>$model->nombre, 'apellido'=>$model->apellido, 'ente'=> $model->jubiladoEnte->nombre_ente, 'nu_oficio'=>$model->nu_oficio, 'fecha_oficio'=>date("d/m/Y", strtotime($model->fecha_oficio)), 'nu_vp'=>$model->nu_vp, 'fecha_recibido'=>date("d/m/Y", strtotime($model->fecha_recibido)), 'estatus'=>$model->jubiladoEstatu->estado];
   
        }


        return $data;
    }
}
