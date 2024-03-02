<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;
use App\Services\TaskService;
use App\Http\Filters\TaskFilter;

class TaskController extends Controller
{
    public $service;

    public function __construct(TaskService $service){
        $this->service = $service;
    }
    
    public function index(FilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(TaskFilter::class,['queryParams' => array_filter($data)]);
        return (new TaskCollection(Task::filter($filter)->paginate()))->additional(['message' => '']);
    }

    public function show(Task $task){
        return (new TaskResource($task))->additional(['message' => '']);
    }
    
    public function store(TaskRequest $request)
    {   $data = $request->validated();

        $task = new Task();
        $this->service->store($data,$task);
 
        return (new TaskResource($task))->additional(['message' => 'Created']);
    }

    public function update(TaskRequest $request, Task $task)
    {
        
        $data = $request->validated();

        $this->service->store($data,$task);
 
        return (new TaskResource($task))->additional(['message' => 'Updated']);
    }
    public function destroy(Task $task)
    {
        $task->delete();
 
        return (new TaskCollection(Task::paginate()))->additional(['message' => 'Deleted']);
    }
}
