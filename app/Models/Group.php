<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupName',
        'user_id',
    ];

    // Define the relationship with the User model
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    // Define the relationship with the Group model
    public function groups()
    {
    return $this->hasMany(Group::class);
    }
}
