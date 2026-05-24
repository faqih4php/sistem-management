<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $projects = Project::all();
        $managers = User::whereHas('role', function($q) {
            $q->where('name', 'Project Manager');
        })->get();
        $members = User::whereHas('role', function($q) {
            $q->where('name', 'Member');
        })->get();
        $tasks = Task::all();

        return view('dashboard', compact('projects', 'managers', 'members', 'tasks'));
    }
}
