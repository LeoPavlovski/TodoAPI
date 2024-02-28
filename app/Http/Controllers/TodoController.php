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
     public function show(Todo $todo){
          return new todoResource($todo);
     }
     public function store (Request $request){
          $validatedData =  $request ->validate([
             'name'=>'required|string',
              'completed'=>'boolean'
          ]);
          $todo = Todo::create($validatedData);

          return new todoResource($todo);
     }

     public function update (Request $request , Todo $todo){
          $validatedData = $request->validate([
              'name'=>'string',
              'completed'=>'boolean'
          ]);
          $todo->update($validatedData);
          return new todoResource($todo);
     }
     public function destroy(Todo $todo){
          $todo ->delete();

          return response()->json(['message'=>'Item has been deleted']);
     }
}
