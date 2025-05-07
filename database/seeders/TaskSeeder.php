<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = File::get(path: 'database/json/tasks.json');
        $tasks = collect(json_decode($jsonData));
        foreach ($tasks as $task) {
            Task::create([
                'title' => $task->title,
                'description' => $task->description,
                'long_description' => $task->long_description
            ]);
        }
    }
}
