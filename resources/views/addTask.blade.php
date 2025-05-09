@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="form-container">
            <h1 class="text-4xl font-bold">Add New Task</h1>
            <form action="{{ route('task.add_new') }}" method="POST" class="row">
                @csrf
                <div class="col-md-12 mt-3 ">
                    <input type="text" name="title" class="input-fields" placeholder="Task Title:">
                </div>
                <div class="col-md-12 mt-3 ">
                    <input type="text" class="input-fields" name="description" placeholder="Description:">
                </div>
                <div class="col-md-12 mt-3">
                    <textarea name="long_description" class="long-desc" placeholder="Long Description:"></textarea>
                </div>
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <button type="submit" class="task_add_btn">Add Task</button>
                </div>
            </form>
        </div>
    </div>
@endsection
