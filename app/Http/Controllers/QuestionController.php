<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
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
    public function store(StoreQuestionRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new question
            $question = Question::create([
                'title_en' => $validatedData['title_en'],
                'title_ar' => $validatedData['title_ar'],
                'title_fr' => $validatedData['title_fr'],
                'quiz_id' => $validatedData['quiz_id'],
            ]);

            // Redirect to the questionzes index with a success message
            return back()->with('success', 'The question has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $question->delete();

            return back()
                ->with('success', 'The question has been successfully deleted.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'An error occurred while trying to delete the question. Please try again.');
        }
    }
}
