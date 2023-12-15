<?php

namespace Database\Factories;

use App\Enums\TaskEnums\TaskPriorities;
use App\Enums\TaskEnums\TaskStatuses;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->word(),
            'description' => $this->faker->text(),
            'assign_by'   => null,
            'assign_to'   => null,
            'status'      => TaskStatuses::CREATED,
            'due_date'    => null,
            'priority'    => TaskPriorities::UNDEFINED,
            'blocked_by'  => null,
        ];
    }
}
