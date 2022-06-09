<?php /** @noinspection ALL */

namespace App\Repositories\Todo;

use App\Models\Todo;
use App\Repositories\Todo\TodoRepositoryInterface;


class TodoRepository implements TodoRepositoryInterface
{
    // get all todos from db
    public function getAllTodos()
    {
        $todos = Todo::orderBy('updated_at','desc')->get();

        return $todos;
    }

    // get single todo from db
    public function getTodo($id)
    {
        $todo = Todo::find($id);

        return $todo;
    }

    // save a todo in db
    public function storeTodo(array $data)
    {
        Todo::create($data);
    }

    // update a specific todo in db
    public function updateTodo($id, array $data)
    {
        $todo = $this->getTodo($id);

        $todo->title = $data['title'];
        $todo->is_completed = $data['is_completed'];

        $todo->save();
    }

    // delete a todo from db
    public function deleteTodo($id)
    {
        $todo = $this->getTodo($id);

        $todo->delete();
    }
}

