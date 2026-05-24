<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index (Project $project, Request $request)
    {
        $projects = Project::with('task', 'user')->get();
        $managers = User::whereHas('role', function($q) {
            $q->where('name', 'Project Manager');
        })->get();
        $members = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        $tasks = Task::all();

        $taskMember = Task::whereHas('user', function($q) {
            $q->where('users.id', Auth::user()->id);
        })->get();

        $projectMember  = $projects->user->whereHas('project', function($q) {
            $q->where('users.id', Auth::user()->id);
        });

        return view('dashboard', compact('projects', 'managers', 'members', 'tasks', 'taskMember', 'projectMember'));
    }
}
