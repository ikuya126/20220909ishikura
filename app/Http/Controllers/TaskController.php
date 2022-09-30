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
        $user = Auth::user();
        $todos = Todo::all();
        return view('index',[
            'tag' => $tag,
            'todos' => $todos,
            'user' => $user
        ]);
    }

    public function create(TodoRequest $request)
    {
        $titles = $request->all();
        $users = Auth::user()->id;
        $tags = $request->input('tag_title');
        Todo::create(['title' => $titles,'user_id' => $users,'tag_id' => $tags]);
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
        $user = Auth::user();
        $todos = Todo::all();
        return view('findpage',[
            'tag' => $tag,
            'todos' => $todos,
            'user' => $user
        ]);
    }

    public function find(TodoRequest $request)
    {
        $task = $request->all();
        $find = Todo::find($id->$task);
        return redirect('/findpage');
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
}
}