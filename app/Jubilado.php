<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jubilado extends Model
{	
	// use SoftDeletes; //Implementamos 

   // protected $dates = ['deleted_at']; //Registramos la nueva columna

        protected $fillable = [
            'cedula',
            'nombre',
            'apellido',
            'edad',
            'genero',
            'antiguedad',
            'sueldo_promedio',
            'nomina_id',
            'ente_id',
            'motivo_id',
            'monto',
            'porcentaje',
            'gaceta_id',
            'observacion',
            'fecha_gaceta',
            'nu_vp',
            'nu_oficio',
            'fecha_oficio',
            'fecha_recibido',
            'estatus_id',
            'id_user',
            'año_registro',
            'fecha_gaceta'
        ];

    public function jubiladoEnte(){
        return $this->belongsTo(Ente::class, 'ente_id');
    }

    public function jubiladoMotivo(){
        return $this->belongsTo(Motivo::class, 'motivo_id');
    }
    public function jubiladoNomina(){
        return $this->belongsTo(Nomina::class, 'nomina_id');
    }
    public function jubiladoUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function jubiladoEstatu(){
        return $this->belongsTo(Estatu::class, 'estatus_id');
    }
}
