<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ente extends Model
{   
    public $table = 'entes';

        protected $fillable = [
        'id',
        'nombre_ente',
        'categoria_id',
        'id_user',
        'created_at',
        'updated_at'
    ];

    public function CategoriaType(){
        return $this->belongsTo(Categoria_ente::class, 'categoria_id');
    }
}

