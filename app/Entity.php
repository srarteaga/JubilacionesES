<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{   
    public $table = 'entes';

        protected $fillable = [
        'id',
        'name',
        'category_id',
        'id_user',
        'entity_mpd'
        'date'

    ];

  /*  public function CategoriaType(){
        return $this->belongsTo(Categoria_ente::class, 'categoria_id');
    }*/
}

