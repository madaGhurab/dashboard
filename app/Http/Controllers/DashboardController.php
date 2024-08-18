<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    // Display the user's dashboard with their tasks
    public function index()
    {
        // Fetch tasks for the authenticated user
        $tasks = auth()->user()->tasks;
        $groups = auth()->user()->groups;
    
    // Pass the tasks and groups to the view
    return view('dashboard', ['tasks' => $tasks, 'groups' => $groups]);

    }
}

