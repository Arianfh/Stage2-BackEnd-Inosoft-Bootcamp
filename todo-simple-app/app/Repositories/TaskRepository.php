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

    public function create($data)
    {
        $post = new $this->tasks;

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->assigned = $data['assigned'];

        $post->save();

        return $post->fresh();
    }
}