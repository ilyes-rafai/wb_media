<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Requests\UpdateTopicSvgRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
            ->withCount('tricks')
            ->withCount('courses')
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


            $uploadedFile = null;

            if ($request->hasFile('svg')) {
                $file = $request->file('svg');
                $newName = uniqid('', true) . '.' . $file->getClientOriginalExtension();
                $uploadPath = public_path('img/topics/');
                $file->move($uploadPath, $newName);

                $uploadedFile = 'img/topics/' .  $newName;
            }

            // Create a new topic
            Topic::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'svg' => $uploadedFile,
                'user_id' => Auth::id(),
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

    public function edit_svg(Topic $topic)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        // Render the Edit component with topic and roles
        return Inertia::render('Partials/Topic/EditSvg', [
            'topic' => $topic,
        ]);
    }

    public function update_svg(UpdateTopicSvgRequest $request, Topic $topic)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Retrieve validated data
            $validated = $request->validated();

            $uploadedFile = null;

            // Handle Svg Upload
            if ($request->hasFile('svg')) {
                $file = $validated['svg'];
                $newName = uniqid('svg_', true) . '.' . $file->getClientOriginalExtension();
                $uploadPath = public_path('img/topics/');

                // Ensure directory exists
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Delete old svg if it exists
                if ($topic->svg && File::exists(public_path($topic->svg))) {
                    File::delete(public_path($topic->svg));
                }

                // Move the uploaded file
                $file->move($uploadPath, $newName);
                $uploadedFile = 'img/topics/' . '/' . $newName;
            }

            // Update topic's svg in the database
            $topic->update([
                'svg' => $uploadedFile,
            ]);

            return redirect()
                ->route('topics.index')
                ->with('success', 'The svg has been successfully updated.');
        } catch (\Exception $e) {
            return redirect()
                ->route('topics.index')
                ->with('error', 'An error occurred while updating the svg. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {

            $topic->tricks()->detach();

            if ($topic->svg) {
                File::delete($topic->svg); // Delete the file
            }

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
