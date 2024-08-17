<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Group; // Import the Group model

class DashboardController extends Controller
{
    // Display the user's dashboard with their tasks and groups
    public function index()
    {
        // Fetch tasks for the authenticated user
        $tasks = auth()->user()->tasks;

        // Fetch groups for the authenticated user
        $groups = auth()->user()->groups;

        // Pass both tasks and groups to the view
        return view('dashboard', [
            'tasks' => $tasks,
            'groups' => $groups
        ]);
    }
}
