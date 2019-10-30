<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{   

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'id_user',
        'entity_mpd',
        'date'

    ];

    public function CategoriaType(){
        return $this->belongsTo(CategoryEntity::class, 'category_id');
    }
}

