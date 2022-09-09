<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TaskController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index',['todos' => $todos]);
    }

    public function create(TodoRequest $request)
    {
        $titles = $request->all();
        Todo::create($titles);
        return redirect('/');
    }

    public function update(TodoRequest $request,$id)
    {
        $todo = Todo::find($id);
        $todo->title= $request->input('title');
        $todo->save();
        return redirect('/');
    }

    public function delete($id)
    {
        $todo=Todo::find($id);
        $todo->delete();
        return redirect('/');
    }
}
