<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;

class TaskPolicy
{
    /**
     * Determine if the user can view all tasks.
     */
    public function viewAll(User $user)
    {
        return $user->role === 'admin';
    }

    // other methods for update, delete, etc.
}

