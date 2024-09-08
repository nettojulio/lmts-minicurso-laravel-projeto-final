<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(): View|Factory|Application
    {
        $issues = Issue::all();
        return view('issue.index', compact('issues'));
    }

    public function create(): View|Factory|Application
    {
        $projects = Project::all();
        $users = User::all();
        return view('issue.create', compact('projects', 'users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        $issue = new Issue($validated);
        $issue->save();

        $issue->users()->attach($validated['users']);

        return redirect()->route('issue.index')->with('success', 'Issue created successfully.');
    }

    public function edit(Issue $issue): View|Factory|Application
    {
        $projects = Project::all();
        $users = User::all();
        return view('issue.edit', compact('issue', 'projects', 'users'));
    }

    public function update(Request $request, Issue $issue): RedirectResponse
    {
        $issue->title = $request->title;
        $issue->description = $request->description;
        $issue->status = $request->status;
        $issue->priority = $request->priority;
        $issue->project_id = $request->project_id;
        $issue->save();

        $issue->assigners()->sync($request->assigners);

        return redirect()->route('issue.index');
    }

    public function destroy(Issue $issue): RedirectResponse
    {
        $issue->delete();
        return redirect()->route('issue.index');
    }

    public function show($id): View|Factory|Application
    {
        $issue = Issue::with('users')->findOrFail($id);
        return view('issue.show', compact('issue'));
    }
}
