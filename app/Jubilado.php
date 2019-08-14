<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class superannuated extends Model
{	
	// use SoftDeletes; //Implementamos 
    public $table = 'superannuated';
   // protected $dates = ['deleted_at']; //Registramos la nueva columna

        protected $fillable = [
            'identification',
            'name',
            'lastname',
            'age',
            'gender',
            'antiquity',
            'salary',
            'roster_id',
            'entity_id',
            'reason_id',
            'rode',
            'percentage',
            'gaceta',
            'date_gaceta',
            'observation',
            'number_correspondecia',
            'number_vp',
            'nu_oficio',
            'date_correspondencia',
            'date_correspondencia_ent',
            'status_id',
            'status_date',
            'user_id',
            'user_date',
            'year'
        ];

    /*public function jubiladoEnte(){
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
    }*/
}
