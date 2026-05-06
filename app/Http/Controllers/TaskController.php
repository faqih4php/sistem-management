<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexMember()
    {
        $tasks = Task::whereHas('user', function($q) {
            $q->where('user_id', Auth::user()->id);
        })->get();

        return view('users.task.index', compact('tasks'));
    }

    public function projectTasks(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $projects = Project::where('project_author', $user->name)->get();

        return view('project-managers.task.project', compact('projects'));
    }

    public function index()
    {
        $tasks = Task::with('project')->get();
        $users = User::whereHas('role', function($q) {
            $q->where('name','Member');
        })->get();
        return view('project-managers.task.index', compact('tasks', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $users = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        // Mengambil project berdasarkan ID dari URL
        $projectId = $request->query('project_id');
        $project = Project::find($projectId);

        return view('project-managers.task.create', compact('users', 'project'));
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
            'user'        => 'required|array|min:1',
            'project_id'  => 'required|exists:projects,id',
        ]);

        $task = Task::create([
            'name'        => $request->name,
            // Memakai getAttribute agar tidak muncul merah di IDE
            'task_author' => Auth::user()->getAttribute('name'),
            'project_id'  => $request->project_id,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
        ]);

        $task->user()->sync($request->user);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        return view('project-managers.task.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'start_date'  => 'required|date|before:end_date',
            'end_date'    => 'required|date|after:start_date',
            'description' => 'required|string|max:255',
            'status'      => 'required',
            'user'        => 'required|array|min:2',
        ]);

        $task->update([
            'name'        => $request->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        $task->user()->sync($request->user);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task = Task::findOrFail($task->id);
        $task->user()->detach();
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
