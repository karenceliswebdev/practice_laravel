<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// /index in browser ingeeft, zal de index functie van todocontroller uitgevoerd worden
//belangrijk klass use vanboven vermelden
Route::get('todos', [TodoController::class, 'index']);

Route::post('todos/store', [TodoController::class, 'store']);

Route::post('todos/update/{id}', [TodoController::class, 'update']);

Route::post('todos/delete/{id}', [TodoController::class, 'destroy']);
