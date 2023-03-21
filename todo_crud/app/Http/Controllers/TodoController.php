<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; //zodat we methods/propertie todo klass kunnen raadplegen

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * geeft onze alle todos van db
     */
    public function index()
    {
        $todos = Todo::all();
       
        //zodat wij dit even snel kunnen zien (vergl vardump array)
        return response()->json([
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        return response()->json([
            'todos' => $todos,
            'status' => 'succes'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $todo = Todo::findOrFail($id);

       //in request zitten alle parameters todo
       $todo->todo = $request->todo;

       if($request->had('completed')) {
            $todo->completed = true;
       }

       $todo->save();

       return response()->json([
            'todo' => $todo,
            'status' => 'succes'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json([
             'status' => 'succes'
        ]);

    }
}
