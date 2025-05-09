<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    function displayTask()
    {
        $allTasks = DB::table('tasks')->get();

        $tasks = DB::table('tasks')->orderBy('id', 'desc')->paginate(8);
        $count = $allTasks->count();
        $task_completed = DB::table('tasks')->where('completed', 1);
        $completed_count = $task_completed->count();
        if ($count > 0) {
            return view('tasks', [
                'tasks' => $tasks,
                'count' => $count,
                'completed_count' => $completed_count
            ]);
        } else {
            echo "Something Went Wrong";
        }
    }
    // Active Tasks:
    function active()
    {

        $tasks = DB::table('tasks')->where('status', 'active')->orderBy('id', 'desc')->paginate(8);

        return view('activeTask', [
            'tasks' => $tasks,

        ]);
    }
    function cancell()
    {

        $tasks = DB::table('tasks')->where('status', 'Cancelled')->paginate(8);

        return view('activeTask', [
            'tasks' => $tasks,

        ]);
    }
    function backlog()
    {

        $tasks = DB::table('tasks')->where('status', 'Backlog')->paginate(8);

        return view('activeTask', [
            'tasks' => $tasks,

        ]);
    }
    function completed()
    {

        $tasks = DB::table('tasks')->where('status', 'completed')->paginate(8);

        return view('activeTask', [
            'tasks' => $tasks,

        ]);
    }
    // --------------------------------
    function singleTask(string $id)
    {
        $singleTask = DB::table('tasks')->where('id', $id)->first();
        return view('singleTask', ['task' => $singleTask]);
    }
    // functions for action
    function statusTrue(string $id)
    {
        $status = DB::table('tasks')->where('id', $id)->update([
            'completed' => true,
            'status' => 'completed'
        ]);
        return redirect()->route('tasks.show', $id);
    }
    function statusFalse(string $id)
    {
        $status = DB::table('tasks')->where('id', $id)->update([
            'completed' => false,
            'status' => 'active'

        ]);
        return redirect()->route('tasks.show', $id);
    }
    // --------------------------------------------------------------------
    // functions for list-task-action
    function statusTrueList(string $id)
    {
        $status = DB::table('tasks')->where('id', $id)->update([
            'completed' => true,
            'status' => 'completed'
        ]);
        return redirect()->route('tasks');
    }
    function statusFalseList(string $id)
    {
        $status = DB::table('tasks')->where('id', $id)->update([
            'completed' => false,
            'status' => 'active'
        ]);
        return redirect()->route('tasks');
    }
    // -------------------------------------------------------
    // edit
    function add(Request $request)
    {
        $add = DB::table('tasks')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            "created_at" =>  Carbon::now(), # new \Datetime()
            "updated_at" =>  Carbon::now(),  # new \Datetime()
        ]);
        if ($add) {
            # code...
            return redirect()->route('tasks');
        } else {
            echo "Something Went Wrong";
        }
    }
    // edit Function
    function showEdit(Request $request, $id)
    {
        $fetchData = DB::table('tasks')->where('id', $id)->first();
        return view('updateTask', [
            'taskData' => $fetchData
        ]);
    }
    function edit(Request $request, $id)
    {
        $edit = DB::table('tasks')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'status' => $request->status,
            "updated_at" => Carbon::now(),  # new \Datetime()

        ]);
        if ($edit) {
            # code...
            return redirect()->route('tasks.show', $id);
        } else {
            echo "Something Went Wrong";
        }
    }
    // delete function 
    function del(string $id)
    {
        $deltask = DB::table('tasks')->where('id', $id)->delete();
        return redirect()->route('tasks');
    }
}
