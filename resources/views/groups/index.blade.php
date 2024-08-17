@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Groups</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('groups.create') }}" class="btn btn-primary mb-3">Create New Group</a>

    @if($groups->isEmpty())
        <p>No groups available. Start by creating a new group.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Members</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->groupName }}</td>
                        <td>{{ $group->members }}</td>
                        <!-- Add options for editing or deleting here if needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
