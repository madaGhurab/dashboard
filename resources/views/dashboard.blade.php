<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-500 dark:text-gray-200 leading-tight">
            {{ __('Dashboarddd') }}
        </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-pink-400 dark:text-gray-100">
                    {{ __("YaY you're logged in!👍🏻") }}
                </div>
            </div>

            <!-- Display tasks -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-11 text-grey-300 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">Your Tasks</h3>

                    @if($tasks->isEmpty())
                        <p>No tasks available. Start by creating a new task from "Task Creation" in navigation bar</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->is_completed ? 'Completed' : 'Incomplete' }}</td>
                                        <td>
                                            @if(!$task->is_completed)
                                                <form action="{{ route('tasks.markAsComplete', $task->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm">Complete</button>
                                                </form>
                                            @endif
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
