<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $posts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        return Inertia::render('Dashboard', ['posts' => $posts]);
    }
}
