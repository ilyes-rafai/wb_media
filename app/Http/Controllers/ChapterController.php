<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class ChapterController extends Controller
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
    public function store(StoreChapterRequest $request)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            $uploadedEpisode = null;

            if ($request->hasFile('episode')) {
                $file = $request->file('episode');
                $newName = uniqid('', true) . '.' . $file->getClientOriginalExtension();
                $uploadPath = public_path('img/courses/' . $validatedData['course_id'] . '/');
                $file->move($uploadPath, $newName);

                $uploadedEpisode = 'img/courses/' . $validatedData['course_id'] . '/' .  $newName;
            }

            $uploadedCover = null;

            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $newName = uniqid('', true) . '.' . $file->getClientOriginalExtension();
                $uploadPath = public_path('img/courses/' . $validatedData['course_id'] . '/');
                $file->move($uploadPath, $newName);

                $uploadedCover = 'img/courses/' . $validatedData['course_id'] . '/' .  $newName;
            }

            // Create a new chapter
            Chapter::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'premium' => $validatedData['premium'],
                'episode' => $uploadedEpisode,
                'cover' => $uploadedCover,
                'course_id' => $validatedData['course_id'],
                'user_id' => Auth::id(),
            ]);

            // Redirect to the courses edit with a success message
            return redirect()
                ->route('courses.edit_chapters_page', $validatedData['course_id'])
                ->with('success', 'The chapter has been successfully created.');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()
                ->route('courses.edit_chapters_page', $request->course_id)
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        if (Gate::denies('is_admin_or_mentor')) {
            abort(404);
        }
        try {
            if ($chapter->episode) {
                File::delete($chapter->episode); // Delete the file
            }

            if ($chapter->cover) {
                File::delete($chapter->cover);
            }

            $chapter->delete();

            return redirect()
                ->back()
                ->with('success', 'The chapter has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
