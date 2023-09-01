<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function showTasks()
    {
        $tasks = $this->taskService->getTasks();
        return response()->json($tasks);
    }

    public function createTask(Request $request)
    {
        $request->validate([
            'title'=>'required|string|min:3',
            'description'=>'required|string',
            'assigned'=>'nullable'
        ]);

        $data = [
            'title'=>$request->post('title'),
            'description'=>$request->post('description'),
            'assigned'=>$request->post('assigned')
        ];

        $taskId = $this->taskService->addTask($data);
        $task = $this->taskService->getById($taskId);
        return response()->json($task);
    }
}
