<?php

namespace App\Http\Controllers;

use App\Models\Application;

use Carbon\Carbon;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostFrontController extends Controller
{

    public function show($id)
    {
        $jobPost = JobPost::findOrFail($id);
        $user = auth()->user();

        // Define the required fields for profile completeness
        // $requiredFields = ['province_of_domicile', 'district_of_domicile', 'postal_address'];
        $requiredFields = [
            'province_of_domicile',
            'district_of_domicile',
            'postal_address',
            'cnic',
            'date_of_birth',
            'phone',
            'address',
            'gender',
            'postal_city',
            'profile_picture'
        ];
        $missingFields = [];

        // Check for missing fields in the user's profile
        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                $missingFields[] = ucfirst(str_replace('_', ' ', $field));
            }
        }

        // Pass the missing fields along with other data to the view
        return view('frontend.apply', compact('jobPost',  'missingFields'));
    }


    public function apply(Request $request, $jobPostId)
    {
        // Validate the uploaded files and form fields
        $request->validate([
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'fees_receipt' => 'required|mimes:pdf,jpeg,png|max:2048',
            'first_name' => 'required|string|max:255',
            'cnic' => 'required',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'religion' => 'nullable|string',
            'province_of_domicile' => 'required|string|max:255',
            'district_of_domicile' => 'required|string|max:255',
            'postal_city' => 'required|string|max:255',
            'postal_address' => 'required|string',
        ]);

        // Fetch the job post
        $jobPost = JobPost::findOrFail($jobPostId);

        $applicationDeadline = Carbon::parse($jobPost->application_deadline);
        if ($applicationDeadline->isBefore(now())) {
            return back()->withErrors(['error' => 'Application deadline has passed.']);
        }

        // Fetch the logged-in user's candidate
        $user = auth()->user();

        // Check if the candidate has already applied for this job
        $existingApplication = Application::where('user_id', $user->id)
            ->where('job_post_id', $jobPost->id)
            ->exists();

        if ($existingApplication) {
            return back()->withErrors(['error' => 'You have already applied for this job.']);
        }

        // Handle file uploads
        $data = $request->only(['resume', 'cover_letter', 'fees_receipt']);
        foreach ($data as $key => $file) {
            if ($file) {
                // Store the uploaded files and get their paths
                $data[$key] = $file->store('uploads/' . $key, 'public');
            } else {
                // If no file is uploaded, set it to null
                $data[$key] = null;
            }
        }
        // dd($data['fees_receipt']);
        $resumePath = $data['resume'] ?? null;
        $cover_letter = $data['cover_letter'] ?? null;

        // Create the application record
        $application = Application::create([
            'user_id' => $user->id,
            'job_post_id' => $jobPost->id,
            'status' => 'applied',
            'resume' => $resumePath,
            'cover_letter' => $cover_letter,
            'fees_receipt' => $data['fees_receipt'],
            'highest_qualification' => $request->highest_qualification,
            'experience_years' => $request->experience_years,
            'payment_status' => 'pending',
            'reviewer_remarks' => '',
            'submission_date' => now(), // Automatically set the submission date to the current time
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'You have successfully applied for the job.');
    }



}
