<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks');
});

Route::get('/tasks', [TaskController::class, 'displayTask'])->name('tasks');

Route::get('/tasks/{id}', [TaskController::class, 'singleTask'])->name('tasks.show');
