<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use App\Http\Requests\StoreVocabularyRequest;
use App\Http\Requests\UpdateVocabularyRequest;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $vocabularies  = Vocabulary::orderby('term', 'ASC')
            ->get();

        return Inertia::render('Partials/Vocabulary/Index', ['vocabularies' => $vocabularies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        return Inertia::render('Partials/Vocabulary/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVocabularyRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new vocabulary
            $vocabulary = Vocabulary::create([
                'term' => $validatedData['term'],
                'meaning' => $validatedData['meaning'],
                'example' => $validatedData['example'],
            ]);

            return redirect()
                ->route('vocabularies.index')
                ->with('success', 'The vocabulary has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('vocabularies.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vocabulary $vocabulary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vocabulary $vocabulary)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Render the Edit component with vocabulary and topics
        return Inertia::render('Partials/Vocabulary/Edit', [
            'vocabulary' => $vocabulary
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVocabularyRequest $request, Vocabulary $vocabulary)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Update the vocabulary fields (excluding topics)
            $vocabulary->update([
                'term' => $validatedData['term'],
                'meaning' => $validatedData['meaning'],
                'example' => $validatedData['example'],
            ]);

            // Redirect to the vocabularies index with a success message
            return redirect()
                ->route('vocabularies.index')
                ->with('success', 'The vocabulary has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('vocabularies.index')
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vocabulary $vocabulary)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $vocabulary->delete();

            return back()
                ->with('success', 'The vocabulary has been successfully deleted.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'An error occurred while trying to delete the vocabulary. Please try again.');
        }
    }
}
