<?php

namespace App\Http\Controllers;

use App\Models\Trick;
use App\Http\Requests\StoreTrickRequest;
use App\Http\Requests\UpdateTrickRequest;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class TrickController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $tricks  = Trick::orderby('created_at', 'DESC')
            ->with('user')
            ->with('topics')
            ->withCount('instructions')
            ->get();

        return Inertia::render('Partials/Trick/Index', ['tricks' => $tricks]);
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
        return Inertia::render('Partials/Trick/Create', ['topics' => $topics]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrickRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new trick
            $trick = Trick::create([
                'title_en' => $validatedData['title_en'],
                'title_ar' => $validatedData['title_ar'],
                'title_fr' => $validatedData['title_fr'],
                'user_id' => Auth::id(),
            ]);

            // Attach topics if provided
            if (!empty($validatedData['topics'])) {
                $trick->topics()->attach($validatedData['topics']);
            }

            // Redirect to the tricks index with a success message
            return redirect()
                ->route('tricks.index')
                ->with('success', 'The trick has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('tricks.index')
                ->with('error', $e->getMessage());
        }
    }

    public function handleTrickPremium(Trick $trick)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {

            $premium = $trick->premium;

            $trick->update([
                'premium' => !$premium,
            ]);

            return back()
                ->with('success', 'The trick has been successfully updated.');
        } catch (\Exception $e) {

            return back()
                ->with($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Trick $trick)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trick $trick)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Load the topics relationship
        $trick->load('topics');

        // Fetch all available topics
        $topics = Topic::all();

        // Render the Edit component with trick and topics
        return Inertia::render('Partials/Trick/Edit', [
            'trick' => $trick,
            'topics' => $topics,
            'createdBy' => $trick->user->username,
        ]);
    }

    public function edit_instructions_page(Trick $trick)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        // Load the topics relationship
        $trick->load('topics');
        $trick->load('instructions');

        // Render the Edit component with trick & topics & instructions
        return Inertia::render('Partials/Trick/EditTrickInstructions', [
            'trick' => $trick,
            'createdBy' => $trick->user->username,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrickRequest $request, Trick $trick)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Update the trick fields (excluding topics)
            $trick->update([
                'title_en' => $validatedData['title_en'],
                'title_ar' => $validatedData['title_ar'],
                'title_fr' => $validatedData['title_fr'],
                'premium' => $validatedData['premium'] ?? false, // Handle premium if it's part of the form
            ]);

            // Sync topics with the pivot table
            if (!empty($validatedData['topics'])) {
                $trick->topics()->sync($validatedData['topics']);
            }

            // Redirect to the tricks index with a success message
            return redirect()
                ->route('tricks.index')
                ->with('success', 'The trick has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('tricks.index')
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trick $trick)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $trick->topics()->detach();
            $trick->delete();

            return redirect()
                ->route('tricks.index')
                ->with('success', 'The trick has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->route('tricks.index')
                ->with('error', 'An error occurred while trying to delete the trick. Please try again.');
        }
    }
}
