<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): AnonymousResourceCollection
    {
        $projects = (new Project())
            ->with('todos')
            ->paginate(25);

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return ProjectResource
     */
    public function store(StoreProjectRequest $request): ProjectResource
    {
        $project = Project::create([
            'created_by' => $request->user()->id,
            'name' => $request->input('name'),
        ]);

        return new ProjectResource($project);
    }
}
