<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Question;
use Illuminate\Support\Facades\Gate;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create the new option
            $option = Option::create([
                'title' => $validatedData['title'],
                'question_id' => $validatedData['question_id'],
                'is_correct' => $validatedData['is_correct'] ?? false, // Default to false if not specified
            ]);

            if ($validatedData['is_correct']) {
                // If the new option is marked as correct, set all other options for the same question as incorrect
                Option::where('question_id', $validatedData['question_id'])
                    ->where('id', '<>', $option->id) // Exclude the newly created option
                    ->update(['is_correct' => false]);
            }

            // Redirect to the options index with a success message
            return back()->with('success', 'The option has been successfully created.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return back()->with('error', $e->getMessage());
        }
    }


    /**
     * Handle correct option of the specified resource.
     */
    public function HandleCorrectOption(Option $option)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            if (!$option->is_correct) {
                Option::where('question_id', $option->question_id)
                    ->where('id', '<>', $option->id)
                    ->update(['is_correct' => false]);

                Option::whereId($option->id)
                    ->update(['is_correct' => true]);
            } else {
                return;
            }



            return back()->with('success', 'The correct option has been updated successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions and return the error message
            return back()->with('error', $e->getMessage());
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $option->delete();

            return back()
                ->with('success', 'The option has been successfully deleted.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'An error occurred while trying to delete the option. Please try again.');
        }
    }
}
