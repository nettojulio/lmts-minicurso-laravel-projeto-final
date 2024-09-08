<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Projects</title>
</head>
<body>

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Projects</h2>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul style="display: flex; flex-direction: row; justify-content: space-between">
                        <li>
                            <a href="{{ route('project.create') }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul style="display: flex; flex-direction: row; justify-content: space-between">
                        <li>
                            Title
                        </li>
                        <li>
                            Description
                        </li>
                        <li>
                            Status
                        </li>
                        <li>
                            Created
                        </li>
                        <li>
                            Updated
                        </li>
                    </ul>
                    <ul>
                        @foreach($projects as $project)
                            <a href="{{ route('project.show', $project->id) }}"
                               style="text-decoration: none; color: inherit;">
                                <ul style="display: flex; flex-direction: row; justify-content: space-between; margin-top: 1rem">
                                    <li> {{ $project->title }}</li>
                                    <li> {{ $project->status }} </b></li>
                                    <li> {{ $project->description }} </li>
                                    <li> {{ $project->created_at }}</li>
                                    <li> {{ $project->updated_at }}</li>
                                </ul>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
