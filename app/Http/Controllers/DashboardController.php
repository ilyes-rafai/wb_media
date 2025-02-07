<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Trick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $perPage  = 6;

        $posts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->take($perPage)
            ->get();

        $tricks = Trick::select('id', 'title', 'premium', 'user_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'fullname', 'avatar', 'verified');
                },
                'topics' => function ($query) {
                    $query->select('topics.id', 'topics.name', 'topics.svg');
                },
            ])
            ->take($perPage)
            ->get();

        $courses = Course::select('id', 'title', 'premium', 'user_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'fullname', 'avatar', 'verified');
                },
                'topics' => function ($query) {
                    $query->select('topics.id', 'topics.name', 'topics.svg');
                },
            ])
            ->take($perPage)
            ->get();



        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'courses' => $courses,
            'tricks' => $tricks,
        ]);
    }

    public function quizList()
    {
        return Inertia::render('Client/Quiz/List');
    }

    public function exerciceList()
    {
        return Inertia::render('Client/Exercice/List');
    }

    public function vocabularyList()
    {
        return Inertia::render('Client/Vocabulary/List');
    }

    public function trickList()
    {
        $tricks = Trick::select('id', 'title', 'premium', 'user_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'fullname', 'avatar', 'verified');
                },
                'topics' => function ($query) {
                    $query->select('topics.id', 'topics.name', 'topics.svg');
                },
            ])
            ->get();

        return Inertia::render('Client/Trick/List', [
            'tricks' => $tricks,
        ]);
    }

    public function trickShow(Trick $trick)
    {
        if ($trick->premium) {
            if (Gate::denies('is_admin_or_subscriber_or_mentor')) {
                abort(404);
            }
            $trick->load([
                'topics:id,name,svg',
                'user:id,username',
                'instructions'
            ]);
        } else {
            $trick->load([
                'topics:id,name,svg',
                'user:id,username',
                'instructions',
            ]);
        }

        // Render the Edit component with trick and topics
        return Inertia::render('Client/Trick/Show', [
            'trick' => $trick,
        ]);
    }

    public function courseList()
    {
        $courses = Course::select('id', 'title', 'premium', 'user_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'fullname', 'avatar', 'verified');
                },
                'topics' => function ($query) {
                    $query->select('topics.id', 'topics.name', 'topics.svg');
                },
            ])
            ->get();

        return Inertia::render('Client/Course/List', [
            'courses' => $courses,
        ]);
    }

    public function courseShow(course $course)
    {
        if ($course->premium) {
            if (Gate::denies('is_admin_or_subscriber_or_mentor')) {
                abort(404);
            }
            $course->load('topics', 'user', 'chapters');
        } else {
            $course->load('topics', 'user', 'chapters');
        }

        // Render the Edit component with course and topics
        return Inertia::render('Client/Course/Show', [
            'course' => $course,
        ]);
    }
}
