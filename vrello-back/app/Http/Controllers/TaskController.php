<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(): Paginator {
        return Task::paginate(30);
    }

    public function show(Task $task): Task {
        return $task;
    }

    public function store(StoreTaskRequest $request) {
        $task = Task::create([
            'content' => $request->validated('content')
        ]);

        return response()->json($task);
    }

    public function update(Task $task, UpdateTaskRequest $request): JsonResponse {
        $task->update($request->validated());

        return response()->json($task);
    }

    public function destroy(Task $task): JsonResponse {
        $task->delete();

        return response()->json(null, 204);
    }
}
