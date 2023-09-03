<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Exception;
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
        $data = $request->only([
            'title',
            'description',
            'assigned'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->taskService->addTask($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
