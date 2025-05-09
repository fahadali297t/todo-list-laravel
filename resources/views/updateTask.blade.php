@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="form-container">
            <h1 class="text-4xl font-bold">Update Task</h1>
            <form action="{{ route('task.update', $taskData->id) }}" method="POST" class="row">
                @csrf
                <div class="col-md-12 mt-3 ">
                    <input type="text" class="input-fields" name="title" value="{{ $taskData->title }}"
                        placeholder="Task Title:">
                </div>
                <div class="col-md-12 mt-3 ">
                    <input type="text" class="input-fields" name="description" value="{{ $taskData->description }}"
                        placeholder="Description:">
                </div>
                <div class="col-md-12 mt-3">
                    <select name="status" class="status form-select" name="long_description" id="">
                        <option value="active">
                            Active
                        </option>
                        <option value="Backlog">Backlog</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>

                </div>
                <div class="col-md-12 mt-3">
                    <textarea name="long_description" style="height: 150px" class="long-desc" placeholder="Long Description:">{{ $taskData->long_description }}
                    </textarea>
                </div>
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <button type="submit" class="task_add_btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
