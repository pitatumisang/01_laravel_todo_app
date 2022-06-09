<?php
namespace App\Repositories\Todo;

interface TodoRepositoryInterface
{
    public function getAllTodos();
    public function storeTodo(array $data);
    public function getTodo($todo);
    public function updateTodo($id, array $data);
    public function deleteTodo($id);
}
