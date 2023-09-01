<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService {

    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    
    public function getTasks()
    {
        return $this->taskRepository->getAll();
    }

    public function getById(string $taskId)
    {
        return $this->taskRepository->getById($taskId);
    }

    public function addTask(array $data)
    {
        return $this->taskRepository->create($data);
    }
}