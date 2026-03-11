<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Routing\RouteRegistrar;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/todos', [AuthController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

    Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::patch('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');

    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');

    Route::get('/todos/search', [TodoController::class, 'search'])->name('todos.search');
});
