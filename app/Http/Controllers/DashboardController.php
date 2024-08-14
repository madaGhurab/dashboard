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
    
        // Pass the tasks to the view
        return view('dashboard', ['tasks' => $tasks]);
    }
}

