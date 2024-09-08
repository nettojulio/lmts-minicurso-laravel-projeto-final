<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit Issue</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <div style="display: flex; justify-content: center; align-items: center">
        <form action="{{ route('issue.update', $issue->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div >
                <label for="title" class="p-6 text-gray-900 dark:text-gray-100">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $issue->title) }}">
            </div>

            <div>
                <label for="description" class="p-6 text-gray-900 dark:text-gray-100">Description</label>
                <textarea name="description" id="description">{{ old('description', $issue->description) }}</textarea>
            </div>

            <label class="p-6 text-gray-900 dark:text-gray-100">Status:</label>
            <input type="radio" id="open" name="status" value="open" checked required>
            <label for="open" class="p-6 text-gray-900 dark:text-gray-100">Open</label>

            <input type="radio" id="close" name="status" value="close">
            <label for="close" class="p-6 text-gray-900 dark:text-gray-100">Close</label>

            <br><br>

            <label for="priority" class="p-6 text-gray-900 dark:text-gray-100">Priority:</label>
            <input type="radio" id="low" name="priority" value="low" checked required>
            <label for="low" class="p-6 text-gray-900 dark:text-gray-100">Low</label>

            <input type="radio" id="medium" name="priority" value="medium">
            <label for="medium" class="p-6 text-gray-900 dark:text-gray-100">Medium</label>

            <input type="radio" id="high" name="priority" value="high">
            <label for="high" class="p-6 text-gray-900 dark:text-gray-100">High</label>

            <br><br>

            <label for="start_at" class="p-6 text-gray-900 dark:text-gray-100">Start Date:</label>
            <input type="date" id="start_at" name="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}" required>
            <br><br>

            <label for="end_at" class="p-6 text-gray-900 dark:text-gray-100">End Date:</label>
            <input type="date" id="end_at" name="end_at" value="{{ old('end_at', now()->format('Y-m-d')) }}" required>
            <br><br>

            <label for="project_id" class="p-6 text-gray-900 dark:text-gray-100">Project:</label>
            <select id="project_id" name="project_id" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>
            <br><br>

            <label for="assigners" class="p-6 text-gray-900 dark:text-gray-100">Assign Users:</label>
            @foreach($users as $user)
                <div>
                    <input type="checkbox" id="user{{ $user->id }}" name="assigners[]" value="{{ $user->id }}"
                           @if($issue->assigners && in_array($user->id, $issue->assigners->pluck('id')->toArray())) checked @endif>
                    <label for="user{{ $user->id }}" class="p-6 text-gray-900 dark:text-gray-100">{{ $user->name }}</label>
                </div>
            @endforeach

            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Update Issue</button>
                <a href="{{ route('issue.index') }}">
                    <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Back</button>
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
