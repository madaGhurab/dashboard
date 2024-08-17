<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    // Display the Groups on the dashboard
    public function index()
    {
        $groups = auth()->user()->groups; // Get groups for the authenticated user
        return view('groups.index', ['groups' => $groups]);
    }

    // Display the group creation form
    public function create()
    {
        return view('groups.create');
    }

    // Store the new group
    public function store(Request $request)
    {
        $request->validate([
            'groupName' => 'required|unique:groups|string|max:255',
            'Members.*' => 'nullable|email',
        ]);

        $group = new Group;
        $group->groupName = $request->input('groupName');
        $group->user_id = auth()->id();
        $group->save();

        // Optionally, handle member invitations here

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    // Delete a group
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
