<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\Trick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function attachUserQuiz(Request $request)
    {
        try {
            $quiz = Quiz::findOrFail($request->quiz_id);
            $user = auth()->user();

            // Store user answers as JSON
            $answers = json_encode($request->userAnswers);

            // Attach quiz to user with answers
            $user->quizzes()->attach($quiz->id, [
                'correctCount' => $request->correctCount,
                'totalCount' => $request->totalCount,
                'answers' => $answers, // Store user answers
            ]);

            return back()->with('success', 'Your answers have been saved successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function dashboard()
    {
        $perPage  = 6;

        $posts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->take($perPage)
            ->get();

        $tricks = Trick::select('id', 'title_en', 'title_ar','title_fr', 'premium', 'user_id', 'created_at')
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
        $quizzes = Quiz::where("is_published", 1)
            ->select('id', 'title', 'description', 'difficulty', 'topic_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->with([
                'topic' => function ($query) {
                    $query->select('topics.id', 'topics.name', 'topics.svg');
                },
            ])
            ->get();

        return Inertia::render('Client/Quiz/List', [
            'quizzes' => $quizzes,
        ]);
    }

    public function quizShow(Quiz $quiz)
    {
        // Check if the quiz is published
        if ($quiz->is_published == 1) {
            // Get the authenticated user ID
            $userId = auth()->id();

            // Check if the quiz is already attached to the user
            $isAttached = $quiz->users()->where('user_id', $userId)->exists();

            if (!$isAttached) { // Ensure the user has NOT taken the quiz before rendering
                $quiz = Quiz::whereId($quiz->id)
                    ->with([
                        'topic' => function ($query) {
                            $query->select('id', 'name', 'svg');
                        },
                        'questions' => function ($query) {
                            $query->select('id', 'title', 'quiz_id');
                        },
                        'questions.options' => function ($query) {
                            $query->select('id', 'title', 'is_correct', 'question_id');
                        },
                    ])
                    ->first();
            } else {
                $quiz = Quiz::whereId($quiz->id)
                    ->with([
                        'topic' => function ($query) {
                            $query->select('id', 'name', 'svg');
                        },
                        'questions' => function ($query) {
                            $query->select('id', 'title', 'quiz_id');
                        },
                        'questions.options' => function ($query) {
                            $query->select('id', 'title', 'is_correct', 'question_id');
                        },
                        'users' => function ($query) {
                            $query->select('quiz_user.correctCount', 'quiz_user.totalCount', 'quiz_user.answers');
                        }
                    ])
                    ->first();
            }
            return Inertia::render('Client/Quiz/Show', [
                'quiz' => $quiz,
            ]);
        } else {
            abort(404); // Quiz is not published
        }
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
        $tricks = Trick::select('id', 'title_en', 'title_ar','title_fr', 'premium', 'user_id', 'created_at')
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
