<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        $courses  = Course::orderby('created_at', 'DESC')
            ->with('user')
            ->with('topics')
            ->withCount('chapters')
            ->get();

        return Inertia::render('Partials/Course/Index', ['courses' => $courses]);
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
        return Inertia::render('Partials/Course/Create', ['topics' => $topics]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Create a new course
            $course = Course::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'premium' => $validatedData['premium'],
                'user_id' => Auth::id(),
            ]);

            // Attach topics if provided
            if (!empty($validatedData['topics'])) {
                $course->topics()->attach($validatedData['topics']);
            }

            // Redirect to the courses index with a success message
            return redirect()
                ->route('courses.index')
                ->with('success', 'The course has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('courses.index')
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Load the topics relationship
        $course->load('topics');

        // Fetch all available topics
        $topics = Topic::all();

        // Render the Edit component with course and topics
        return Inertia::render('Partials/Course/Edit', [
            'course' => $course,
            'topics' => $topics,
            'createdBy' => $course->user->username,
        ]);
    }

    public function edit_chapters_page(Course $course)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        // Load the topics relationship
        $course->load('topics');
        $course->load('chapters');

        // Render the Edit component with course & topics & chapters
        return Inertia::render('Partials/Course/EditCourseChapters', [
            'course' => $course,
            'createdBy' => $course->user->username,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Update the course fields (excluding topics)
            $course->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'premium' => $validatedData['premium'] ?? false, // Handle premium if it's part of the form
            ]);

            // Sync topics with the pivot table
            if (!empty($validatedData['topics'])) {
                $course->topics()->sync($validatedData['topics']);
            }

            // Redirect to the courses index with a success message
            return redirect()
                ->route('courses.index')
                ->with('success', 'The course has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('courses.index')
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {

            $course->topics()->detach();

            foreach ($course->chapters as $chapter) {
                if ($chapter->episode) {
                    File::delete($chapter->episode);
                }
                if ($chapter->cover) {
                    File::delete($chapter->cover);
                }
            }

            $course->delete();

            return redirect()
                ->route('courses.index')
                ->with('success', 'The course has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->route('courses.index')
                ->with('error', $e->getMessage());
        }
    }
}
