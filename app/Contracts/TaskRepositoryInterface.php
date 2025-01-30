<?php

namespace App\Contracts;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function gatAllTasks(): Collection;

    public function getTasksByUser(User $user): Collection;

    public function createTask(array $data): Task;

    public function updateTask(Task $task, array $data): bool;

    public function deleteTask(Task $task): bool;
}
