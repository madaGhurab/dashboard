<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all tasks from all users
        $tasks = Task::with('user')->get();
        return view('admin.dashboard', compact('tasks'));
    }

    public function manageUsers()
    {
        // Fetch all users
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
