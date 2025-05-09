<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('/dash', 'welcome');

Route::get('/', function () {
    return redirect()->route('tasks');
});

Route::get('/tasks', [TaskController::class, 'displayTask'])->name('tasks');

Route::get('/tasks/{id}', [TaskController::class, 'singleTask'])->name('tasks.show');

// Routes for actions

Route::post('/statusTrue/{id}', [TaskController::class, 'statusTrue'])->name('task.statusTrue');
Route::post('/statusFalse/{id}', [TaskController::class, 'statusFalse'])->name('task.statusFalse');

// Routes for task-list action:
Route::post('/statusTrue-list/{id}', [TaskController::class, 'statusTrueList'])->name('task.statusTrue-list');
Route::post('/statusFalse-list/{id}', [TaskController::class, 'statusFalseList'])->name('task.statusFalse-list');
// -----------------------------------------------------------------------------------------------
Route::post('/edit/{id}', [TaskController::class, 'showEdit'])->name('task.edit');
Route::post('/update/{id}', [TaskController::class, 'edit'])->name('task.update');

Route::view('/add', 'addTask')->name('task.add');
Route::post('/add-new', [TaskController::class, 'add'])->name('task.add_new');

Route::post('/del/{id}', [TaskController::class, 'del'])->name('task.del');
//---------------------------------------------------------------------------------------------
// Route For Tasks
Route::get('/activeTasks', [TaskController::class, 'active'])->name('task.active');
Route::get('/cancellTask', [TaskController::class, 'cancell'])->name('task.cancell');
Route::get('/backlogTask', [TaskController::class, 'backlog'])->name('task.backlog');
Route::get('/completedTask', [TaskController::class, 'completed'])->name('task.completed');
