<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit Project</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <div style="display: flex; justify-content: center; align-items: center;">
        <form action="{{ route('project.update', $project->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div>
                <label for="title" class="p-6 text-gray-900 dark:text-gray-100">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}">
            </div>

            <div>
                <label for="description" class="p-6 text-gray-900 dark:text-gray-100">Description</label>
                <textarea name="description" id="description">{{ old('description', $project->description) }}</textarea>
            </div>

            <label class="p-6 text-gray-900 dark:text-gray-100">Status:</label>
            <input type="radio" id="pending" name="status" value="pending" checked required>
            <label for="pending" class="p-6 text-gray-900 dark:text-gray-100">Pending</label>

            <input type="radio" id="in_progress" name="status" value="in_progress">
            <label for="in_progress" class="p-6 text-gray-900 dark:text-gray-100">In Progress</label>

            <input type="radio" id="completed" name="status" value="completed">
            <label for="completed" class="p-6 text-gray-900 dark:text-gray-100">Completed</label>
            <br><br>

            <label for="start_at" class="p-6 text-gray-900 dark:text-gray-100">Start Date:</label>
            <input type="date" id="start_at" name="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}" required>
            <br><br>

            <label for="end_at" class="p-6 text-gray-900 dark:text-gray-100">End Date:</label>
            <input type="date" id="end_at" name="end_at" value="{{ old('end_at', now()->format('Y-m-d')) }}" required>
            <br><br>

            <p class="p-6 text-gray-900 dark:text-gray-100">Members</p>
            <ul>
                @foreach($project->members as $member)
                    <li class="p-6 text-gray-900 dark:text-gray-100">{{ $member->name }}</li>
                @endforeach
            </ul>

            <p class="p-6 text-gray-900 dark:text-gray-100">Select Members</p>
            <div>
                @foreach($users as $user)
                    <label class="p-6 text-gray-900 dark:text-gray-100">
                        <input type="checkbox" name="members[]" value="{{ $user->id }}"
                            {{ $project->members->contains($user->id) ? 'checked' : '' }}>
                        {{ $user->name }}
                    </label>
                    <br>
                @endforeach
            </div>

            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <button type="submit" style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Update Project</button>
                <a href="{{ route('project.index') }}">
                    <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Back</button>
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
