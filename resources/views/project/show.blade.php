<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Project Details</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column">
        <div>
            <p class="p-6 text-gray-900 dark:text-gray-100">Title: {{ $project->title }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Description: {{ $project->description }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Status: {{ $project->status }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Start Date: {{ $project->start_at }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">End Date: {{ $project->end_at }}</p>
            <p class="p-6 text-gray-900 dark:text-gray-100">Owner: {{ $project->user->name }}</p>

        </div>
        <div>
            <p  class="p-6 text-gray-900 dark:text-gray-100">Members</p>
            <ul>
                @foreach($project->members as $member)
                    <li class="p-6 text-gray-900 dark:text-gray-100">{{ $member->name }}</li>
                @endforeach
            </ul>
        </div>
        <br><br>

        <div style="display: flex; flex-direction: row; justify-content: space-between;">
            <a href="{{ route('project.edit', $project->id) }}">
                <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Edit Project</button>
            </a>
            <a href="{{ route('project.index') }}">
                <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Back</button>
            </a>
        </div>
    </div>
</div>
</body>
</html>
