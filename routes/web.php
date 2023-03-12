<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/task/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/task/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');
