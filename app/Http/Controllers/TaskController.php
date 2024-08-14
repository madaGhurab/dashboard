<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Display the list of tasks
    public function index()
    {
        $tasks = auth()->user()->tasks; // Get tasks for the authenticated user
        return view('tasks.index', compact('tasks'));
    }

    // Display the task creation form
    public function create()
    {
        return view('tasks.create');
    }

    // Store the new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = auth()->user()->id;
        $task->save();

        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    }
}
