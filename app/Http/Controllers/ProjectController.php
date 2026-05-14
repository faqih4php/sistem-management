<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexMember(Project $project, Task $task)
    {
        $projects = Project::whereHas('task', function($q) {
            $q->whereHas('user', function($e) {
                $e->where('users.id', Auth::user()->id);
            });
        })->get();

        $tasks = Auth::user()->task()->whereIn('project_id', $projects->pluck('id'))->get();

        return view('users.project.index', compact('projects', 'tasks'));
    }

    public function index()
    {
        $tasks = Task::all();
        $projects = Project::all();
        $users = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        return view('project-managers.project.index', compact('projects', 'users', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        return view('project-managers.project.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'start_date'  => 'required|date|before:end_date',
            'end_date'    => 'required|date|after:start_date',
            'description' => 'required|string|max:255',
            'user'        => 'required|array|min:2',
        ]);

        $project = Project::create([
            'name'        => $request->name,
            'project_author' => Auth::user()->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
        ]);

        $project->user()->sync($request->user);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $projects = Project::with('task', 'user')->findOrFail($project->id);

        $tasks = Task::whereIn('project_id', $projects->pluck('id'))->get();

        $taskDones = Task::where('status', 'finished')
        ->whereIn('project_id', $projects->pluck('id'))->get();

        return view('users.project.show', compact('projects', 'tasks', 'taskDones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $users = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        return view('project-managers.project.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'start_date'  => 'required|date|before:end_date',
            'end_date'    => 'required|date|after:start_date',
            'description' => 'required|string|max:255',
            'status'      => 'required',
            'user'        => 'required|array|min:1',
        ]);

        $project->update([
            'name'        => $request->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        $project->user()->sync($request->user);

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project = Project::findOrFail($project->id);
        $project->user()->detach();
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
