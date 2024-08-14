@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Tasks</h1>

        @if ($tasks->isEmpty())
            <p>No tasks available.</p>
        @else
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item">
                        <strong>{{ $task->title }}</strong>
                        <p>{{ $task->description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
