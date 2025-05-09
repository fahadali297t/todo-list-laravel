@extends('layout.app')

@section('content')
    <div class="container   mt-5">
        <div class="d-flex justify-content-between">
            <h1 class="text-4xl mb-2">{{ $task->title }}</h1>
            @if ($task->completed == 0)
                <button disabled class="btn-incomplete mb-2" style="color: #FF2929 ">
                    This task is not completed yet.
                </button>
            @else
                <button disabled class="btn-complete mb-2" style="color: #65B741 ">Congratulation on completing this
                    task</button>
            @endif
        </div>
        <hr class="hr">

        <div class="d-flex justify-content-between">
            <a class="backlink mt-3" href="{{ route('tasks') }}"><i class="fa-solid fa-arrow-left-long"></i> &nbsp; Go back
                to task
                list</a>
            <button disabled class=" btn-active mt-3">
                Status: {{ $task->status }}
            </button>
        </div>
        <div class="description mt-4">


            <p>{{ $task->description }}</p>
            <p>{{ $task->long_description }}</p>
            <div class="d-flex justify-end gap-3 mt-3 align-items-center">
                <span class="primary">
                    Created: {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans() }}

                </span>
                <br>
                <span class="secondary">
                    Last Update: {{ \Carbon\Carbon::parse($task->updated_at)->diffForHumans() }}
                </span>
            </div>
        </div>
        <div class=" mt-3">

            <div class="actions">

                <div class="d-flex -50 w-full justify-content-end align-items-center">
                    <form action="{{ route('task.edit', $task->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn">Edit</button>
                    </form>

                    {{-- for mark as completed  --}}
                    @if ($task->completed == 0 && ($task->status == 'active' || $task->status == 'Backlog'))
                        <form action="{{ route('task.statusTrue', $task->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn">Mark as Completed</button>
                        </form>
                    @elseif ($task->completed == 0 && $task->status == 'Cancelled')
                        <form action="{{ route('task.statusTrue', $task->id) }}" method="post">
                            @csrf
                            <button disabled type="submit" class="btn btn-disabeled">Mark as Completed</button>
                        </form>
                    @else
                        <form action="{{ route('task.statusFalse', $task->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn">Mark as Incomplete</button>
                        </form>
                    @endif

                    <form action="{{ route('task.del', $task->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn">Delete</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
