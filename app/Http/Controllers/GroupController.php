<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class GroupController extends Controller
{
    // Display the Groups on the dashboard
    public function index()
    {
        $groups = auth()->user()->groups()->get(); // Get groups for the authenticated user
        return view('dashboard', compact('groups'));
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
            'groupName' => 'required|string|max:255',
            'Members' => 'required|string',
        ]);

        $group = new Group;
        $group->groupName = $request->groupName;
        $group->user_id = auth()->id();
        $group->save();

        return redirect()->route('dashboard')->with('success', 'Group created successfully.');
    }

    // Delete a group
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('dashboard')->with('success', 'Group deleted successfully.');
    }
    // Edit a group
    //public function edit(Group $group){
    //    $group->edit();
    //    return redirect()->route('dashboard')->with('success', 'Group edited successfully.');
   // }
}
