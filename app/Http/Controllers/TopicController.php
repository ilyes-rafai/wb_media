<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        $topics  = Topic::orderby('created_at', 'DESC')
            ->with('user')
            ->withCount('projects')
            ->get();

        return Inertia::render('Partials/Topic/Index', ['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        return Inertia::render('Partials/Topic/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new topic
            Topic::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'svg' => $validatedData['svg'],
                'user_id' => Auth::id(), // Auth::id() is cleaner and more concise
            ]);

            // Redirect to the topics index with a success message
            return redirect()
                ->route('topics.index')
                ->with('success', 'The topic has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('topics.index')
                ->with('error', 'An error occurred while creating the topic. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        return Inertia::render('Partials/Topic/Edit', ['topic' => $topic, 'createdBy' => $topic->user->username]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new topic
            $topic->update($validatedData);

            // Redirect to the topics index with a success message
            return redirect()
                ->route('topics.index')
                ->with('success', 'The topic has been successfully updated.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('topics.index')
                ->with('error', 'An error occurred while creating the topic. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        try {
            $topic->delete();

            return redirect()
                ->route('topics.index')
                ->with('success', 'The topic has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->route('topics.index')
                ->with('error', 'An error occurred while trying to delete the topic. Please try again.');
        }
    }
}
