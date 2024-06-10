<?php

namespace App\Http\Controllers\Api;
use App\Models\Todolist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
  public function index(){
    return Todolist::where('user_id',Auth::id())->get();
  }

  //Create Todo list
  public function store(Request $request)
  {
    $request->validate([
        'title' => 'required|string|max:255',
        'description'=> 'nullable|strig',
        'completed' => 'boolean',
    ]);
    $todo = Todolist::create([
        'user_id'=> Auth::id(),
        'title' => $request->title,
        'description' => $request->description,
        'completed' => $request->completed,
    ]);

    return response()->json($todo,201);
  }

  public function show($id)
  {
    $todo = Todolist::where('user_id', Auth::id())->findOrFail($id);
    return response()->json($todo);
  }

  public function update(Request $request, $id){
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'completed'=> 'boolean',
    ]);
    $todo = Todolist::where('user_id',auth::id())->findOrFail($id);
    $todo->update($request->all());

    return response()->json($todo);
  }

  public function destroy($id){
    $todo = Todolist::where('user_id', Auth::id())->findOrFail($id);
    $todo->delete();

    return response()->json(null,204);
  }
}
