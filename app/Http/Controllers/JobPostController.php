<?php

namespace App\Http\Controllers;

use App\Models\JobPost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobPostController extends Controller
{
    public function index()
    {
        $jobPosts = JobPost::all();
        return view('backend.jobpost.index', compact('jobPosts'));
    }

    public function create()
    {

        return view('backend.jobpost.create');
    }

    public function store(Request $request)
    {



        // Validation rules for the fields
        // dd($request);
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string', // Optional requirements
            'advertisement_date' => 'required|date',
            'application_deadline' => 'required|date',
            'advertisement_file' => 'nullable|mimes:pdf,jpeg,png|max:10240', // File validation
            'status' => 'required|in:active,inactive,expired',

        ]);

        // Handle file upload for advertisement file
        $filePath = null;
        if ($request->hasFile('advertisement_file')) {
            $filePath = $request->file('advertisement_file')->store('job-posts', 'public');
        }

        // Convert checkbox to boolean for is_visible
        $isVisible = $request->input('is_visible') === 'on' ? true : false; // Checkbox to boolean (true if checked, false if unchecked)

        // Create the JobPost
        JobPost::create([
            'organization_name' => $request->organization_name,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'advertisement_date' => $request->advertisement_date,
            'application_deadline' => $request->application_deadline,
            'advertisement_file' => $filePath,
            'status' => $request->status,
            'is_visible' => $isVisible,
        ]);

        return redirect()->route('job-posts.index')->with('success', 'Job Post created successfully.');
    }


    public function show(JobPost $jobPost)
    {
        return view('backend.jobpost.show', compact('jobPost'));
    }

    public function edit(JobPost $jobPost)
    {


        return view('backend.jobpost.create', compact('jobPost'));
    }

    public function update(Request $request, JobPost $jobPost)
    {
        // Validation rules for the fields
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string', // Optional requirements
            'advertisement_date' => 'required|date',
            'application_deadline' => 'required|date',
            'advertisement_file' => 'nullable|mimes:pdf,jpeg,png|max:10240', // File validation
            'status' => 'required|in:active,inactive,expired',

        ]);
        $isVisible = $request->input('is_visible') === 'on' ? true : false;
        // Handle file upload if a new file is uploaded
        if ($request->hasFile('advertisement_file')) {
            // Delete the old file if it exists
            if ($jobPost->advertisement_file) {
                Storage::disk('public')->delete($jobPost->advertisement_file);
            }

            $filePath = $request->file('advertisement_file')->store('job-posts', 'public');
        } else {
            $filePath = $jobPost->advertisement_file; // Retain the old file if no new file is uploaded
        }

        // Update the JobPost
        $jobPost->update([
            'organization_name' => $request->organization_name,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'advertisement_date' => $request->advertisement_date,
            'application_deadline' => $request->application_deadline,
            'advertisement_file' => $filePath,
            'status' => $request->status,
            'is_visible' => $isVisible
        ]);

        return redirect()->route('job-posts.index')->with('success', 'Job Post updated successfully.');
    }

    public function destroy(JobPost $jobPost)
    {
        // Delete the file associated with the job post
        if ($jobPost->advertisement_file) {
            Storage::disk('public')->delete($jobPost->advertisement_file);
        }

        $jobPost->delete();
        return redirect()->route('job-posts.index')->with('success', 'Job Post deleted successfully.');
    }
}
