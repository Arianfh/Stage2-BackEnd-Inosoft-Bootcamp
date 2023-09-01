<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository {

    protected $tasks;
    
    public function __construct(Task $tasks)
    {
        $this->tasks = $tasks;
    }
    
    public function getAll()
    {
        return $this->tasks->get([]);
    }

    public function getById(string $id)
    {
        return $this->tasks->find('_id', $id);
    }

    public function create(array $data)
    {
        $dataSaved = [
            'title'=>$data['title'],
            'description'=>$data['description'],
            'assigned'=>$data['assigned']
        ];

        return $this->tasks->save($dataSaved);
    }
}