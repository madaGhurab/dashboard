<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    // Display the user's dashboard with their tasks
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('dashboard', compact('tasks'));
    }
}

