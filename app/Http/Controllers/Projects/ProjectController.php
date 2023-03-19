<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return Project::query()
            ->where('user_id', $user->id)
            ->get();
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function store(StoreRequest $request)
    {
        $project = new Project();
        $project->user()->associate(auth()->user());
        $project->fill($request->all());
        $project->save();

        return $this->success($project);
    }

    public function update(Project $project, Request $request)
    {
        $project->fill($request->all());
        $project->save();
        $project->refresh();

        return $this->success($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return $this->success();
    }
}
