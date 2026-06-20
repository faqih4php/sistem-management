<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $users = auth()->user()->findOrFail($id);
        $tasks = Task::all();
        $projects = Project::whereHas('task', function($q) {
            $q->whereHas('user', function($e) {
                $e->where('users.id', Auth::user()->id);
            });
        })->get();
        return view('settings.index', compact('users', 'tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('settings.index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
