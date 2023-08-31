<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService {

    private TaskRepository $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }
    
    public function getTasks()
    {
        $tasks = $this->taskRepository->getAll();
        return $tasks;
    }

    public function getById(string $taskId)
    {
        $tasks = $this->taskRepository->getById($taskId);
        return $tasks;
    }

    public function addTask(array $data)
    {
        $taskId = $this->taskRepository->create($data);
        return $taskId;
    }
}