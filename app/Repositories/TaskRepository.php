<?php

namespace App\Repositories;

use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @return Collection
     */
    public function gatAllTasks(): Collection
    {
        return Task::all();
    }

    /**
     * @param User $user
     * @return Collection
     */
    public function getTasksByUser(User $user): Collection
    {
        return $user->tasks;
    }

    /**
     * @param array $data
     * @return Task
     */
    public function createTask(array $data): Task
    {
        return Task::create($data);
    }

    /**
     * @param Task $task
     * @param array $data
     * @return bool
     */
    public function updateTask(Task $task, array $data): bool
    {
        return $task->update($data);
    }

    /**
     * @param Task $task
     * @return bool
     */
    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }
}
