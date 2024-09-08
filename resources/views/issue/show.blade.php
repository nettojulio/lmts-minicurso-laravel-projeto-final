<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Issue Details</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column">
        <div>
            <p class="p-6 text-gray-100 dark:text-gray-100">Issue: {{ $issue->title }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Description: {{ $issue->description }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Status: {{ $issue->status }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Priority: {{ $issue->priority }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Project ID: {{ $issue->project_id }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Created At: {{ $issue->created_at }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Updated At: {{ $issue->updated_at }}</p>

            <p class="p-6 text-gray-900 dark:text-gray-100">Assigned Users:</p>
            <ul>
                @foreach($issue->users as $user)
                    <li class="p-6 text-gray-900 dark:text-gray-100">{{ $user->name }} ({{ $user->email }})</li>
                @endforeach
            </ul>
        </div>

        <div style="display: flex; flex-direction: row; justify-content: space-between;">
            <a href="{{ route('issue.edit', $issue->id) }}">
                <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Edit Issue</button>
            </a>
            <a href="{{ route('issue.index') }}">
                <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Back</button>
            </a>
        </div>
    </div>
</div>
</body>
</html>
