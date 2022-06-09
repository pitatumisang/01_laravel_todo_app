<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->repository->getAllTodos();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTodo = [
            'title' => $request->title
        ];

        $this->repository->storeTodo($newTodo);

        return response()->json(['message' => 'Todo Added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->repository->getTodo($id)) {

            return $this->repository->getTodo($id);
        }

        return response()->json(['message' => 'Todo not found!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repository->updateTodo($id, $request->all());

        return response()->json(['message' => 'Todo Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->deleteTodo($id);
    }
}
