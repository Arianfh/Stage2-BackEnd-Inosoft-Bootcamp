<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
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
            'description'=>'required|string'
        ]);

        $data = [
            'title'=>$request->post('title'),
            'description'=>$request->post('description')
        ];

        $taskId = $this->taskService->addTask($data);
        $task = $this->taskService->getById($taskId);
        return response()->json($task);
    }
}
