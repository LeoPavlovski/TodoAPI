<?php

namespace App\Http\Controllers;

use App\Http\Resources\todoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // We are going to write functions here for the crud operations.
      public function index(){
            $todos = Todo::all();
            return todoResource::collection($todos);
    }

}
