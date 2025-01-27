<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $posts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->take(10)
            ->get();

        $projects = Project::orderBy('created_at', 'desc')
            ->with('user')
            ->with('topics')
            ->take(10)
            ->get();

        $courses = Course::orderBy('created_at', 'desc')
            ->with('user')
            ->with('topics')
            ->take(10)
            ->get();

        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'courses' => $courses,
            'projects' => $projects,
        ]);
    }

    public function projectList()
    {
        $projects = Project::orderBy('created_at', 'desc')
            ->with('user')
            ->with('topics')
            ->get();

        return Inertia::render('Client/Project/List', [
            'projects' => $projects,
        ]);
    }

    public function projectShow(Project $project)
    {
        if ($project->premium) {
            if (Gate::denies('is_admin_or_subscriber_or_mentor')) {
                abort(404);
            }
            $project->load('topics', 'user', 'instructions');
        } else {
            $project->load('topics', 'user', 'instructions');
        }

        // Render the Edit component with project and topics
        return Inertia::render('Client/Project/Show', [
            'project' => $project,
        ]);
    }

    public function courseList()
    {
        $courses = course::orderBy('created_at', 'desc')
            ->with('user')
            ->with('topics')
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
