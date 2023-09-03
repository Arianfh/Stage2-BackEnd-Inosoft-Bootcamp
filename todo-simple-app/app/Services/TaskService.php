<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

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

    public function addTask($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'assigned' => 'nullable'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->taskRepository->create($data);

        return $result;
        return $this->taskRepository->create($data);
    }
}