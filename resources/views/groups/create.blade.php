@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Create Group</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="groupName" class="form-label">Group Name</label>
            <input type="text" name="groupName" id="groupName" class="form-control" value="{{ old('groupName') }}" required>
        </div>
        <div class="mb-3">
            <label for="Members" class="form-label">Members (Invite them by Email)</label>
            <input type="email" name="Members[]" id="Members" class="form-control" value="{{ old('Members.0') }}" placeholder="email@example.com">
            <!-- Add additional fields as necessary -->
        </div>
        <button type="submit" class="btn btn-primary">Create Group</button>
    </form>
</div>
@endsection
