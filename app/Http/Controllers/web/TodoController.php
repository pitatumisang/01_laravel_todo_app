<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Repositories\Todo\TodoRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    // get all todos
    public function index()
    {
        $todos = $this->repository->getAllTodos();

        return view("todo.index", ["todos" => $todos]);
    }

    public function create()
    {
        //
    }

    public function store(TodoRequest $request)
    {
        // $formFields = $request->validate([
        //     'title' => ['required']
        // ]);

        // $validatedData = $request->validated();

        $this->repository->storeTodo($request->all());

        return redirect("/");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $todo = $this->repository->getTodo($id);

        return view("todo.edit", ["todo" => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        // $formFields = $request->validate([
        //     'title' => ['required']
        // ]);

        // $validatedData = $request->validated();

        $completed = $request->completed === "on" ? 1 : 0;

        $updateData = [
            "title" => $request["title"],
            "is_completed" => $completed,
        ];

        $this->repository->updateTodo($id, $updateData);

        return redirect("/");
    }

    public function destroy($id)
    {
        $this->repository->deleteTodo($id);

        return redirect("/");
    }
}
