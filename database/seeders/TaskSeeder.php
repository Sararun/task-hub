<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $tasksFactories = Task::factory()->count(22)->make();
        $tasksFactories->each(function (Task $task) {
            $user = User::all()->random();
            try {
                $randomTask = Task::inRandomOrder()->firstOrFail();
                $task->blocked_by = $randomTask->id;
                $task->assign_by = $user->id;
                $task->save();
            } catch (ModelNotFoundException) {
                $task->assign_by = $user->id;
                $task->save();
            }
        });
    }
}
