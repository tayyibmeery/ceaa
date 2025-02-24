<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Carbon\Carbon;
use App\Models\JobPost;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class JobPostFrontController extends Controller
{
    /**
     * Required profile fields for application
     */
    protected $requiredProfileFields = [
        'province_of_domicile' => 'Province of Domicile',
        'district_of_domicile' => 'District of Domicile',
        'postal_address' => 'Postal Address',
        'cnic' => 'CNIC',
        'date_of_birth' => 'Date of Birth',
        'phone' => 'Phone Number',
        'address' => 'Address',
        'gender' => 'Gender',
        'postal_city' => 'Postal City',
        'profile_picture' => 'Profile Picture'
    ];

    public function show($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to apply for this job.');
        }

        $jobPost = JobPost::findOrFail($id);
        $user = auth()->user();

        $missingFields = [];

        foreach ($this->requiredProfileFields as $field => $label) {
            if (empty($user->$field)) {
                $missingFields[] = $label;
            }
        }

        return view('frontend.apply', compact('jobPost', 'missingFields'));
    }

    public function apply(Request $request, $jobPostId)
    {
        try {
            DB::beginTransaction();

            // Validate the request
            $validated = $request->validate([
                // Document Uploads
                'resume' => [
                    'nullable',
                    'mimes:pdf,doc,docx',
                    'max:2048', // 2MB
                    'file'
                ],
                'cover_letter' => [
                    'nullable',
                    'mimes:pdf,doc,docx',
                    'max:2048'
                ],
                'fees_receipt' => [
                    'required',
                    'mimes:pdf,jpeg,png',
                    'max:2048',
                    'file'
                ],

                // Application Details
                'highest_qualification' => [
                    'required',
                    'string',
                    'max:255',
                    'exists:educations,degree_title,user_id,' . auth()->id()
                ],
                'experience_years' => [
                    'integer',
                    'min:0',
                    'max:50'
                ],

                // Personal Information
                'first_name' => ['required', 'string', 'max:255'],
                'cnic' => ['required', 'string', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
                'dob' => ['required', 'date', 'before:today'],
                'phone' => ['required', 'string', 'max:15'],
                'address' => ['nullable', 'string', 'max:500'],
                'religion' => ['nullable', 'string', 'max:50'],

                // Location Details
                'province_of_domicile' => ['required', 'string', 'max:255'],
                'district_of_domicile' => ['required', 'string', 'max:255'],
                'postal_city' => ['required', 'string', 'max:255'],
                'postal_address' => ['required', 'string', 'max:500'],
            ], [
                'cnic.regex' => 'The CNIC must be in format: XXXXX-XXXXXXX-X',
                'fees_receipt.required' => 'Please upload the application fees receipt',
                'highest_qualification.exists' => 'Please select a qualification from your education records',
                'dob.before' => 'Date of birth must be in the past'
            ]);

            // Fetch and validate job post
            $jobPost = JobPost::findOrFail($jobPostId);

            // Check application deadline
            if (Carbon::parse($jobPost->application_deadline)->isPast()) {
                return back()->withErrors(['error' => 'Application deadline has passed.'])
                    ->withInput();
            }

            // Check for existing application
            if ($this->hasExistingApplication($jobPost->id)) {
                return back()->withErrors(['error' => 'You have already applied for this job.'])
                    ->withInput();
            }

            // Handle file uploads
            $fileData = $this->handleFileUploads($request);

            // Create application
            Application::create([
                'user_id' => auth()->id(),
                'job_post_id' => $jobPost->id,
                'status' => 'applied',
                'resume' => $fileData['resume'] ?? null,
                'cover_letter' => $fileData['cover_letter'] ?? null,
                'fees_receipt' => $fileData['fees_receipt'],
                'highest_qualification' => $request->highest_qualification,
                'experience_years' => $request->experience_years ?? 0,
                'payment_status' => 'pending',
                'reviewer_remarks' => '',
                'submission_date' => now(),
            ]);

            DB::commit();
            return redirect()->back()
                ->with('success', 'Your application has been submitted successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['error' => 'An error occurred while submitting your application. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Check if user has already applied for the job
     */
    private function hasExistingApplication($jobPostId): bool
    {
        return Application::where('user_id', auth()->id())
            ->where('job_post_id', $jobPostId)
            ->exists();
    }

    /**
     * Handle file uploads for the application
     */
    // private function handleFileUploads(Request $request): array
    // {
    //     $fileData = [];
    //     foreach (['resume', 'cover_letter', 'fees_receipt'] as $fileType) {
    //         if ($request->hasFile($fileType)) {
    //             $fileData[$fileType] = $request->file($fileType)
    //                 ->store("uploads/$fileType", 'public');
    //         } else {
    //             $fileData[$fileType] = null;
    //         }
    //     }
    //     return $fileData;
    // }


    private function handleFileUploads(Request $request): array
    {
        $fileData = [];

        foreach (['resume', 'cover_letter', 'fees_receipt'] as $fileType) {
            if ($request->hasFile($fileType)) {
                $uploadPath = public_path("uploads/$fileType");
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true); // Create directory with full permissions
                }
                $fileName = time() . '_' . $request->file($fileType)->getClientOriginalName();
                $request->file($fileType)->move($uploadPath, $fileName);
                $fileData[$fileType] = "uploads/$fileType/$fileName";
            } else {
                $fileData[$fileType] = null;
            }
        }

        return $fileData;
    }
}
