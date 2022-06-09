<?php

use App\Http\Controllers\web\TodoController;
use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*----Todos routes-----*/
Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/todo', [TodoController::class, 'store']);


Route::get('todo/{id}/edit', [TodoController::class, 'edit'])->middleware('auth');
Route::put('/todo/{id}', [TodoController::class, 'update']);

Route::delete('/todo/{id}', [TodoController::class, 'destroy']);


/*----User routes-----*/
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');


Route::get('/login', [UserController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
