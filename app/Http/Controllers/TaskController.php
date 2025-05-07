<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    function displayTask()
    {
        $tasks = DB::table('tasks')->get();
        if ($tasks) {
            return view('tasks', [
                'tasks' => $tasks
            ]);
        } else {
            echo "Something Went Wrong";
        }
    }
    function singleTask(string $id)
    {
        $singleTask = DB::table('tasks')->where('id', $id)->first();
        return $singleTask;
    }
}
