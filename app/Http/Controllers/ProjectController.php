<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects($type = null)
    {
        $query = JobPost::query();

        switch ($type) {
            case 'new':
                $query->active()->where('created_at', '>=', now()->subDays(7))
                    ->orderBy('created_at', 'desc');
                break;
            case 'ongoing':
                $query->active()->where('application_deadline', '>', now())
                    ->orderBy('application_deadline', 'asc');
                break;
            case 'completed':
                $query->where('application_deadline', '<=', now())
                    ->orderBy('application_deadline', 'desc');
                break;
            default:
                // Default to "new" if no type is provided
                $query->active()->where('created_at', '>=', now()->subDays(7))
                    ->orderBy('created_at', 'desc');
                break;
        }

        $posts = $query->paginate(10);

        return view('frontend.project', [
            'posts' => $posts,
            'type' => $type
        ]);
    }


}
