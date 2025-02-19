<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $quizzes = Quiz::with('topic')->get();
        return Inertia::render('Partials/Quiz/Index', [
            'quizzes' => $quizzes,
        ]);
    }

    public function handleQuizPublished(Quiz $quiz)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {

            $is_published = $quiz->is_published;

            $quiz->update([
                'is_published' => !$is_published,
            ]);

            return back()
                ->with('success', 'The quiz has been successfully updated.');
        } catch (\Exception $e) {

            return back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $topics = Topic::select('id', 'name')->get();
        return Inertia::render('Partials/Quiz/Create', [
            'topics' => $topics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new quiz
            $quiz = Quiz::create([
                'title_en' => $validatedData['title_en'],
                'title_ar' => $validatedData['title_ar'],
                'title_fr' => $validatedData['title_fr'],
                'topic_id' => $validatedData['topic_id'],
                'description_en' => $validatedData['description_en'],
                'description_ar' => $validatedData['description_ar'],
                'description_fr' => $validatedData['description_fr'],
                'difficulty' => $validatedData['difficulty'],
                'is_published' => $validatedData['is_published'],
            ]);

            // Redirect to the quizzes index with a success message
            return redirect()
                ->route('quizzes.index')
                ->with('success', 'The quiz has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $topics = Topic::select('id', 'name')->get();
        return Inertia::render('Partials/Quiz/Edit', [
            'quiz' => $quiz,
            'topics' => $topics,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Update the quiz fields (excluding topics)
            $quiz->update([
                'title_en' => $validatedData['title_en'],
                'title_ar' => $validatedData['title_ar'],
                'title_fr' => $validatedData['title_fr'],
                'topic_id' => $validatedData['topic_id'],
                'description_en' => $validatedData['description_en'],
                'description_ar' => $validatedData['description_ar'],
                'description_fr' => $validatedData['description_fr'],
                'difficulty' => $validatedData['difficulty'],
                'is_published' => $validatedData['is_published'] ?? false, // Handle is_published if it's part of the form
            ]);

            // Sync topics with the pivot table
            if (!empty($validatedData['topics'])) {
                $quiz->topics()->sync($validatedData['topics']);
            }

            // Redirect to the quizzes index with a success message
            return redirect()
                ->route('quizzes.index')
                ->with('success', 'The quiz has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit_questions_page(Quiz $quiz)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $mainQuiz = Quiz::whereId($quiz->id)->with('questions')
            ->with('questions.options')
            ->first();

        // Render the Edit component with quiz & topic & questions
        return Inertia::render('Partials/Quiz/EditQuizQuestions', [
            'quiz' => $mainQuiz,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            $quiz->delete();

            return back()
                ->with('success', 'The quiz has been successfully deleted.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'An error occurred while trying to delete the quiz. Please try again.');
        }
    }
}
