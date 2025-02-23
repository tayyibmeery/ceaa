<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects()
    {
        $posts = JobPost::active()
            ->where('application_deadline', '>', now())
            ->orderBy('application_deadline', 'asc')
            ->paginate(10);

        return view('frontend.project', compact('posts'));
    }

    public function newProjects()
    {
        $posts = JobPost::active()
            ->where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.project', [
            'posts' => $posts,
            'type' => 'new'
        ]);
    }

    public function allProjects()
    {
        $posts = JobPost::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.project', [
            'posts' => $posts,
            'type' => 'all'
        ]);
    }

    public function ongoingProjects()
    {
        $posts = JobPost::active()
            ->where('application_deadline', '>', now())
            ->orderBy('application_deadline', 'asc')
            ->paginate(10);

        return view('frontend.project', [
            'posts' => $posts,
            'type' => 'ongoing'
        ]);
    }

    public function completedProjects()
    {
        $posts = JobPost::where('application_deadline', '<=', now())
            ->orderBy('application_deadline', 'desc')
            ->paginate(10);

        return view('frontend.project', [
            'posts' => $posts,
            'type' => 'completed'
        ]);
    }

    public function latestProjects()
    {
        $posts = JobPost::active()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.project', [
            'posts' => $posts,
            'type' => 'latest'
        ]);
    }
}
