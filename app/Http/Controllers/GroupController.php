<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GroupInvitation;

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
        // Validate the input
        $request->validate([
            'groupName' => 'required|unique:groups|max:255',
            'emails.*' => 'email', // Validate each email
        ]);

        // Create the group
        $group = new Group();
        $group->groupName = $request->input('groupName');
        $group->user_id = auth()->id();
        $group->save();

        // Get the email addresses
        $emails = $request->input('emails');
        
        foreach ($emails as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                // Attach user to the group (assuming a pivot table for many-to-many relationship)
                $group->users()->attach($user->id);
                
                // Notify user (if you have a notification system)
                Notification::send($user, new GroupInvitation($group));
            }
        }

        return redirect()->route('groups.index')->with('success', 'Group created and invitations sent!');
    }
    // Delete a group
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
