@extends('layout.app');

@section('content')
    <div class="top d-flex justify-content-center align-items-center gap-6">
        <i class="fa-solid fa-list-check text-3xl font-bold secondary "></i>
        <h1><span class="primary">To</span><span class="secondary">Do</span></h1>
    </div>
    <div class="mt-5">
        <form action="" method="post" class="flex flex-row justify-center align-items-center gap-4">
            <input type="text" name="title" class="h-16 inputFields bg-amber-50 " placeholder="Enter Title:">
            <button type="submit" class="btn-custom h-16 w-16"><i
                    class="fa-solid fa-magnifying-glass text-3xl"></i></button>
        </form>
    </div>

    <div class="d-flex justify-between max-w-250 m-auto align-middle mt-5">
        <h6 class="primary flex justify-center align-items-center gap-2">
            Tasks Created
            <span class="rounded-box">
                5
            </span>
        </h6>
        <h6 class="secondary flex justify-center align-items-center gap-2">
            Tasks Completed
            <span class="rounded-box">
                4
            </span>
        </h6>

    </div>
    <hr class="hr max-w-250 m-auto">

    <div class="mt-5 m-auto max-w-250">

        <div class="flex flex-col">
            @forelse ($tasks as $task)
                <div class="task mb-3">

                    <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }} </a>
                    <span class="action">
                        <a href=""><i class="fa-solid fa-trash"></i></a>
                    </span>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
