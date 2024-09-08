<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create Project</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <div style="display: flex; justify-content: center; align-items: center; margin: 100px 0">
        <form action="{{ route('project.store') }}" method="post">
            @csrf

            <label for="title" style="color: #e2e8f0">Title:</label>
            <input type="text" id="title" name="title" placeholder="Project Name" required>
            <br><br>

            <label for="description" style="color: #e2e8f0">Description:</label>
            <input type="text" id="description" name="description" placeholder="Project Description" required>
            <br><br>

            <label style="color: #e2e8f0">Status:</label>
            <input type="radio" id="pending" name="status" value="pending" checked required>
            <label for="pending" style="color: #e2e8f0">Pending</label>

            <input type="radio" id="in_progress" name="status" value="in_progress">
            <label for="in_progress" style="color: #e2e8f0">In Progress</label>

            <input type="radio" id="completed" name="status" value="completed">
            <label for="completed" style="color: #e2e8f0">Completed</label>
            <br><br>

            <label for="start_at" style="color: #e2e8f0">Start Date:</label>
            <input type="date" id="start_at" name="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}"
                   required>
            <br><br>

            <label for="end_at" style="color: #e2e8f0">End Date:</label>
            <input type="date" id="end_at" name="end_at" value="{{ old('end_at', now()->format('Y-m-d')) }}" required>
            <br><br>


            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <button type="submit"
                        style="color: #e2e8f0; border: 1px white solid; border-radius: 20px; padding: 10px">Create
                    Project
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
