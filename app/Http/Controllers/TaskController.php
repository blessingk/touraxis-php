<?php

namespace App\Http\Controllers;

use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tasks = $this->taskRepository->gatAllTasks();
        return response()->json(['tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $task = $this->taskRepository->createTask($request->all(['']));
        return response()->json(['task' => $task]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json(['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): JsonResponse
    {
        $data = $request->all();
        $this->taskRepository->updateTask($task, $data);
        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        $this->taskRepository->deleteTask($task);
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }
}
