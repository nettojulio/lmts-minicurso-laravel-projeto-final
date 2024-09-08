<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(): View|Factory|Application
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    public function create(): View|Factory|Application
    {
        return view('project.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->start_at = $request->start_at;
        $project->end_at = $request->end_at;
        $project->user_id = Auth::id();
        $project->save();
        $project->members()->attach(Auth::id());
        return redirect()->route('project.index');
    }

    public function edit(Project $project): View|Factory|Application
    {
        $users = User::all();
        return view('project.edit', compact('project', 'users'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'members' => 'array'
        ]);


        $project->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'start_at' => $request->input('start_at'),
            'end_at' => $request->input('end_at')
        ]);

        $membersWithTimestamps = [];
        $currentTime = now();

        foreach ($request->input('members', []) as $memberId) {
            $membersWithTimestamps[$memberId] = ['created_at' => $currentTime, 'updated_at' => $currentTime];
        }

        $project->members()->sync($membersWithTimestamps);

        return redirect()->route('project.show', $project->id)
            ->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Projeto deletado com sucesso!');
    }

    public function show($id): View|Factory|Application
    {
        $project = Project::findOrFail($id);
        return view('project.show', compact('project'));
    }
}
