<?php

namespace App\Services;

use App\Models\Task;

class TaskService{

    public function store($data, Task $task){
        
        $task->body = $data['body'];
        $task->status_id = $data['status_id'];
        $task->deadline_at = $data['deadline_at'];
        $task->save();


    }

}