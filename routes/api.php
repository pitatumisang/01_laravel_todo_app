<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\TodoController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/todos', [TodoController::class, 'index']);
// Route::post('/todos', [TodoController::class, 'store']);
// Route::get('/todos/{id}', [TodoController::class, 'show']);
// Route::put('/todos/{id}', [TodoController::class, 'update']);
// Route::delete('/todos/{id}', [TodoController::class, 'destroy']);
// Route::apiResource('todos', TodoController::class);

Route::post('/register', [UserController::class, 'store']);

Route::post('/auth', [AuthController::class, 'login']);
Route::get('/auth', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('todos', TodoController::class);
});


