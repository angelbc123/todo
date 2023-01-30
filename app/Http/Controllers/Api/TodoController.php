<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteTodoRequest;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Project;
use App\Models\Todo;
use App\Models\TodoStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $todos = (new Todo())
            ->get();

        return TodoResource::collection($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTodoRequest $request
     * @return TodoResource
     */
    public function store(StoreTodoRequest $request)
    {
        $todoStatus = (new TodoStatus())
            ->whereTodo()
            ->first();

        $todo = Todo::create([
            'owned_by' => $request->user()->id,
            'project_id' => $request->input('project_id'),
            'todo_status_id' => $todoStatus->id,
            'description' => $request->input('description')
        ]);

        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return TodoResource
     */
    public function show(Todo $todo)
    {
        $todo->increment('view_counter');

        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Todo $todo
     * @return TodoResource
     */
    public function marksAsDone(Todo $todo): TodoResource
    {
        $doneStatus = (new TodoStatus())
            ->whereDone()
            ->first();

        $todo->todoStatus()->associate($doneStatus);
        $todo->save();

        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteTodoRequest $request, Todo $todo): \Illuminate\Http\JsonResponse
    {
        $todo->delete();

        return response()
            ->json([
                'message' => 'Todo has been deleted'
            ]);
    }
}
