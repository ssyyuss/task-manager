<?php

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
