<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;

class EntityController extends Controller
{
    public function getEntities(Request $request)
    {
   		$data = Entity::where('category_id', $request->id)->get();

   		return response()->json($data);
    }
}
