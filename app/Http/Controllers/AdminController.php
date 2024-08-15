<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        //dd(1);
        // Ensure only admins can access these methods
        $this->middleware('admin');
    }
    public function index()
    {
        // Fetch all tasks from all users
        $tasks = Task::with('user')->get();
        //dd($this->authorize('viewAll', Task::class));
        //$this->authorize('viewAll', Task::class);
        //authorize is a built in method 
        //viewAll is a method defined in a policy
        //policy has a viewAll method
        return view('admin.dashboard', compact('tasks'));
    }

    public function manageUsers()
    {
        // Fetch all users
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
