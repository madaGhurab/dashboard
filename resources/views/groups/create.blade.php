<!-- resources/views/groups/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Group</h1>
    <form method="POST" action="{{ route('groups.store') }}">
        @csrf

        <!-- Group Name Input -->
        <div class="form-group">
            <label for="groupName">Group Name</label>
            <input type="text" name="groupName" id="groupName" class="form-control" required>
        </div>

        <!-- Email Inputs -->
        <div class="form-group" id="email-fields">
            <label for="emails">Members (Invite by Email)</label>
            <div class="email-field-group">
                <input type="email" name="emails[]" class="form-control mb-2" placeholder="email@example.com" required>
            </div>
            <!-- Button to Add More Email Fields -->
            <button type="button" id="add-email" class="btn btn-secondary">Add Another Email</button>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Group</button>
    </form>
</div>

<script>
    document.getElementById('add-email').addEventListener('click', function () {
        const emailFieldsContainer = document.getElementById('email-fields');
        const newEmailField = document.createElement('input');
        newEmailField.setAttribute('type', 'email');
        newEmailField.setAttribute('name', 'emails[]');
        newEmailField.setAttribute('class', 'form-control mb-2');
        newEmailField.setAttribute('placeholder', 'email@example.com');
        emailFieldsContainer.insertBefore(newEmailField, this);
    });
</script>
@endsection
