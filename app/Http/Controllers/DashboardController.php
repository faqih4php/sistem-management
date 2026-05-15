<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $projects = Project::with('task', 'user')->get();

        return view('dashboard', compact('projects'));
    }
}
