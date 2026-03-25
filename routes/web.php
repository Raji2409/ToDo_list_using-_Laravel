<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('index');

Route::get('create', [TodoController::class, 'create'])->name('create.form');

Route::post('create', [TodoController::class, 'store'])->name('create');

Route::get('edit/{id}', [TodoController::class, 'edit'])->name('edit');

Route::put('edit/{id}', [TodoController::class, 'update'])->name('update');

Route::get('delete/{id}', [TodoController::class, 'delete'])->name('delete');




// Route::get('/', function () {
//     return view('welcome');
// });
