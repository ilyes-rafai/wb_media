<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $projects  = Project::orderby('created_at', 'DESC')
            ->with('user')
            ->with('topics')
            ->withCount('instructions')
            ->get();

        return Inertia::render('Partials/Project/Index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $topics = Topic::orderBy('name')->get();
        return Inertia::render('Partials/Project/Create', ['topics' => $topics]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new project
            $project = Project::create([
                'title' => $validatedData['title'],
                'user_id' => Auth::id(),
            ]);

            // Attach topics if provided
            if (!empty($validatedData['topics'])) {
                $project->topics()->attach($validatedData['topics']);
            }

            // Redirect to the projects index with a success message
            return redirect()
                ->route('projects.index')
                ->with('success', 'The project has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('projects.index')
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Load the topics relationship
        $project->load('topics');

        // Fetch all available topics
        $topics = Topic::all();

        // Render the Edit component with project and topics
        return Inertia::render('Partials/Project/Edit', [
            'project' => $project,
            'topics' => $topics,
            'createdBy' => $project->user->username,
        ]);
    }

    public function edit_instructions_page(Project $project)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        // Load the topics relationship
        $project->load('topics');
        $project->load('instructions');

        // Render the Edit component with project & topics & instructions
        return Inertia::render('Partials/Project/EditProjectInstructions', [
            'project' => $project,
            'createdBy' => $project->user->username,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Update the project fields (excluding topics)
            $project->update([
                'title' => $validatedData['title'],
                'premium' => $validatedData['premium'] ?? false, // Handle premium if it's part of the form
            ]);

            // Sync topics with the pivot table
            if (!empty($validatedData['topics'])) {
                $project->topics()->sync($validatedData['topics']);
            }

            // Redirect to the projects index with a success message
            return redirect()
                ->route('projects.index')
                ->with('success', 'The project has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('projects.index')
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $project->topics()->detach();
            $project->delete();

            return redirect()
                ->route('projects.index')
                ->with('success', 'The project has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'An error occurred while trying to delete the project. Please try again.');
        }
    }
}
