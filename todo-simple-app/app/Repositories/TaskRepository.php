<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository {

    private $tasks;
    
    public function __construct(Task $tasks)
    {
        $this->tasks = $tasks;
    }
    
    public function getAll()
    {
        $tasks = $this->tasks->get([]);
        return $tasks;
    }

    public function getById(string $id)
    {
        $tasks = $this->tasks->find(['_id'=>$id]);
        return$tasks;
    }

    public function create(array $data)
    {
        $dataSaved = [
            'title'=>$data['title'],
            'description'=>$data['description'],
            'assigned'=>null,
            'subtask'=>[],
            'created_at'=>time()
        ];

        $id = $this->tasks->save($dataSaved);
        return $id;
    }
}