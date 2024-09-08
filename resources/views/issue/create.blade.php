<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create Issue</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <div style="display: flex; justify-content: center; align-items: center">
        <form action="{{ route('issue.store') }}" method="POST">
            @csrf

            <label for="title" style="color: #e2e8f0">Title:</label>
            <input type="text" id="title" name="title" placeholder="Issue Name" required>
            <br><br>

            <label for="description" style="color: #e2e8f0">Description:</label>
            <input type="text" id="description" name="description" placeholder="Issue Description" required>
            <br><br>

            <label style="color: #e2e8f0">Status:</label>
            <input type="radio" id="open" name="status" value="open" checked required>
            <label for="open" style="color: #e2e8f0">Open</label>

            <input type="radio" id="close" name="status" value="close">
            <label for="close" style="color: #e2e8f0">Close</label>

            <br><br>

            <label for="priority" style="color: #e2e8f0">Priority:</label>
            <input type="radio" id="low" name="priority" value="low" checked required>
            <label for="low" style="color: #e2e8f0">Low</label>

            <input type="radio" id="medium" name="priority" value="medium">
            <label for="medium" style="color: #e2e8f0">Medium</label>

            <input type="radio" id="high" name="priority" value="high">
            <label for="high" style="color: #e2e8f0">High</label>

            <br><br>

            <label for="start_at" style="color: #e2e8f0">Start Date:</label>
            <input type="date" id="start_at" name="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}"
                   required>
            <br><br>

            <label for="end_at" style="color: #e2e8f0">End Date:</label>
            <input type="date" id="end_at" name="end_at" value="{{ old('end_at', now()->format('Y-m-d')) }}" required>
            <br><br>

            <label for="project_id" style="color: #e2e8f0">Project:</label>
            <select id="project_id" name="project_id" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>
            <br><br>

            <label for="users" style="color: #e2e8f0">Assign Users:</label>
            <select id="users" name="users[]" multiple required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <br><br>

            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <button type="submit"
                        style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Create Issue
                </button>
                <a href="{{ route('project.index') }}">
                    <button style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Back
                    </button>
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
