<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project-managers.project.index', compact('projects'));
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
        //
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
            'user'        => 'required|array|min:2',
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
