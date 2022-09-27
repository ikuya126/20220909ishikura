<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tag = Tag::all();
        return view('index', ['tag' => $tag]);
        $user = Auth::user();
        return view('index', ['user' => $user]);
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

    public function findpage()
    {
        $tag = Tag::all();
        return view('find', ['tag' => $tag]);
        $user = Auth::user();
        return view('find', ['user' => $user]);
        $todos = Todo::all();
        return view('find',['todos' => $todos]);
    }

    public function find(TodoRequest $request)
    {
        $task = $request->all();
        $find = Todo::find($id->$task);
        return redirect('/findpage');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
