<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;



Route::get('/todo/create', function () {
    return view('todo.create');
})->middleware(['auth', 'verified'])->name('todo.create');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ログイン画面

Route::resource('todo', TodoController::class);

Route::get('/todo', [TodoController::class, 'index'])->middleware(['auth'])->name('todo.index');

require __DIR__.'/auth.php';
