@extends('layout.app')

@section('content')
    {{-- <div class="mt-5">
        <form action="" method="post" class="flex flex-row justify-center align-items-center gap-4">
            <input type="text" name="title" class="h-16 inputFields bg-amber-50 " placeholder="Enter Title:">
            <button type="submit" class="btn-custom h-16 w-16"><i
                    class="fa-solid fa-magnifying-glass text-3xl"></i></button>
        </form>
    </div> --}}


    <hr class="hr mt-3 max-w-250 m-auto">

    <div class="mt-4 m-auto max-w-250">
        <a href="{{ route('task.add') }}">Add New Task</a>

    </div>

    <div class="mt-2 m-auto max-w-250">

        <div class="flex flex-col">
            @forelse ($tasks as $task)
                <div
                    @if ($task->completed == 1) class='completed task mb-3'    
                @else 
                class="task mb-3" @endif>


                    <span class="d-flex justify-content-center align-items-center gap-2">
                        <div>
                            @if ($task->completed == 0 && ($task->status == 'active' || $task->status == 'Backlog'))
                                <form action="{{ route('task.statusTrue-list', $task->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="round-btn"></button>

                                </form>
                            @elseif ($task->completed == 0 && $task->status == 'Cancelled')
                                <form action="{{ route('task.statusFalse-list', $task->id) }}" method="post">
                                    @csrf
                                    <button disabled type="submit" class="round-btn cancell"></button>

                                </form>
                            @else
                                <form action="{{ route('task.statusFalse-list', $task->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="round-btn"></button>

                                </form>
                            @endif

                        </div>
                        <a href="{{ route('tasks.show', $task->id) }}" id="task">{{ $task->title }} </a>
                    </span>
                    <span class="action">
                        <p>{{ $task->status }}</p>
                        <form action="{{ route('task.del', $task->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn-del"><i class="fa-solid fa-trash"></i></button>
                        </form>

                    </span>
                </div>

            @empty
            @endforelse
            {{ $tasks->links() }}

        </div>
    </div>
@endsection
