<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'tasks';
    protected $guarded = ['_id'];
    protected $filable = [
        'title',
        'description',
        'assigned',
        'created_at'
    ];
    protected $casts = [
        'subtask' => 'array'
    ];
    protected $timestamps = false;
}
