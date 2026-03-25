<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    
    public function create()
    {
        return view('todos.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'task' => ['required','string','min:3'],
            'status' => ['required']
        ]);

        
        Todo::create([
            'task' => $request->task,
            'status' => $request->status
        ]);

        return redirect(url('/'))->with('success', 'Task created successfully!');  
    }


    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required',
            'status' => 'required'
        ]);

        $todo = Todo::findOrFail($id);

        $todo->update([
            'task' => $request->task,
            'status' => $request->status
        ]);

        return redirect(url('/'));   
    }

   
    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect(url('/'));   
    }
}