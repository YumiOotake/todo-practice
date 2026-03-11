<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('user', 'category', 'status')->get();
        // $users = User::all();
        $categories = Category::all();
        $statuses = Status::all();
        return view('todos.index', compact('todos', 'categories', 'statuses'));
    }
    public function create()
    {
        $categories = Category::all();
        $statuses = Status::all();
        return view('todos.add', compact('categories', 'statuses'));
    }
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['title', 'category_id', 'status_id']);
        $todo['user_id'] = auth()->id();
        Todo::create($todo);
        return redirect()->route('todos.index');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        $categories = Category::all(); //値保持する用
        $statuses = Status::all();
        return view('todos.edit', compact('todo', 'categories', 'statuses'));
    }
    public function update(TodoRequest $request, $id)
    {
        $todo = $request->only(['title', 'category_id', 'status_id']);
        // $todo['user_id'] = auth()->id(); user I'dは更新しないため不要
        Todo::findOrFail($id)->update($todo);
        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return redirect()->route('todos.index');
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category', 'status')->
        CategorySearch($request->category_id)->
        StatusSearch($request->status_id)->
        KeywordSearch($request->keyword)->get();

        $categories = Category::all();
        $statuses = Status::all();
        return view('todos.index', compact('todos', 'categories', 'statuses'));
    }
}
