<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos', compact('todos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:255', 'min:5'],
        ]);

        Todo::create($attributes);
        return redirect('/');
    }

    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        if(isset($_POST['delete']))
        {
            $todo->delete();
            return redirect('/');
        }

        if ($request->title == null)
        {
            $todo->is_done = $request -> is_done ? true : false;
        }
        else
        {
            $this->validate($request, [
                'title' => 'required'
            ]);

            $todo->title = $request->title;
        }
        $todo->save();
        return redirect('/');
    }
}
