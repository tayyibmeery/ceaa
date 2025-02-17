<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Exports\ApplicationsExport;

use App\Models\JobPost;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    public function index()
    {
        // $applications = Application::with('candidate', 'jobPost')->get();
        // return view('backend.application.index', compact('applications'));
        $jobPosts=JobPost::all();

        $applications = Application::with(['user', 'jobPost'])->get();
        return view('backend.application.index', compact('applications','jobPosts'));
    }

    // public function create()
    // {
    //     return view('backend.application.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'job_post_id' => 'required|exists:job_posts,id',
    //     ]);

    //     Application::create($request->all());
    //     return redirect()->route('backend.application.index')->with('success', 'Application created successfully.');
    // }

    // public function show(Application $application)
    // {
    //     return view('backend.application.show', compact('application'));
    // }

    public function edit(Application $application)
    {
        $users =User::all();
        $jobPosts =JobPost::all();
        return view('backend.application.create', compact('application', 'users', 'jobPosts'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'job_post_id' => 'required|exists:job_posts,id',
            'status' => 'required|in:applied,under_review,test_scheduled,test_completed,result_generated,rejected',
            'payment_status' => 'required|in:pending,paid,failed',
            'reviewer_remarks' => 'nullable|string|max:1000', // Max 1000 characters for remarks
        ]);

        $application->update($request->all());
        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('backend.application.index')->with('success', 'Application deleted successfully.');
    }









}
