<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Superannuated extends Model
{
    public $table = 'superannuated';
	protected $dates = ['deleted_at']; //Registramos la nueva columna

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

    public function reasons(){
        return $this->belongsTo(Reason::class, 'reason_id');
    }
    public function rosters(){
        return $this->belongsTo(Roster::class, 'roster_id');
    }
    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function genders(){
        return $this->belongsTo(Gender::class, 'gender', 'code');
    }
    public function entities(){
        return $this->belongsTo(Entity::class, 'entity_id');
    }
}
