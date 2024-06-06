<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Status;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::whereHas('user', function ($query) {
            $query ->where('id', auth()->user()->id);
        })->orderBy('created_at', 'desc')->get();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        $statuses = Status::all();
        return view('todo.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required | max:255',
            'body' => 'max:1000',
            'due_date' => 'required | date',
            'status_id' => 'required | exists:status,id'
        ]);

        $todo = new Todo(); //インスタンスの作成
        $todo->title = $inputs['title'];
        $todo->body = $inputs['body'];
        $todo->due_date = $inputs['due_date'];
        $todo->status_id = $inputs['status_id'];
        $todo->user_id = auth()->user()->id;
        $todo->save();

        return to_route('todo.index')->with('message', 'ToDoを作成しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        $statuses = Status::all();
        return view('todo.edit', compact('todo', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $inputs=$request->validate([
            'title' => 'required | max:255',
            'body' => 'max:1000',
            'due_date' => 'required | date',
            'status_id' => 'required|exists:status,id'
        ]);

        $todo->title = $inputs['title'];
        $todo->body = $inputs['body'];
        $todo->due_date = $inputs['due_date'];
        $todo->status_id = $inputs['status_id'];
        $todo->save();

        return to_route('todo.index')->with('success', 'ToDoを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return to_route('todo.index');
    }
}
