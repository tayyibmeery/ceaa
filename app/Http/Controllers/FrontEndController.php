<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use App\Models\Highlight;
use App\Models\JobPost;
use App\Models\OurService;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Trem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FrontEndController extends Controller
{
 public function index(){
    $slider=Slider::All();
    $lights=Highlight::all();
        $posts = JobPost::active(5)
        ->where('application_deadline', '>', now()) // Ensure the application deadline is in the future
        ->orderBy('application_deadline', 'asc')  // Order by the application deadline in ascending order
        ->get();
        return view('frontend.index',\compact('slider','lights', 'posts'));
 }

    public function vision()
    {
        $cores=CoreValue::all();
        return view('frontend.vision', \compact('cores'));
    }

    public function servises()
    {
        $ourservise=OurService::all();
        return view('frontend.servises', \compact('ourservise'));
    }
    // public function projects()
    // {
    //     $posts=JobPost::active(5)->get();
    //     return view('frontend.project' ,\compact('posts'));
    // }

    public function applicationstatus(){
        return view('frontend.applicationstatus');
    }









    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.plans', compact('page'));
    }

    public function ourtrem($slug)
    {
        $trem = Trem::where('slug', $slug)->firstOrFail();
        return view('frontend.ourtrem', compact('trem'));
    }




    public function profileshow()
    {

        $candidate = Auth::user();
        $posts = JobPost::active(5)->orderBy('created_at', 'desc')->get();


        return view('frontend.profile', compact('candidate', 'posts'));
    }

    // Edit Profile Method
    public function profileedit()
    {
        // Retrieve the currently authenticated user's profile for editing
        $candidate = Auth::user()->orderBy('id', 'desc');

        // Return the edit profile view with the current data
        return view('frontend.edit', compact('candidate'));
    }

    // Update Profile Method
    public function profileupdate(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',  // Full Name is required and a string
            'last_name' => 'nullable|string|max:255',  // Full Name is required and a string
            'father_name' => 'nullable|string|max:255',  // Full Name is required and a string
            'cnic' => 'nullable|string|unique:users,cnic|max:15|regex:/^\d{5}-\d{7}-\d{1}$/',

            'date_of_birth' => 'nullable|date',  // Date of Birth is optional but must be a valid date
            'phone' => 'nullable|string|max:15',  // Phone number is optional with max length of 15
            'address' => 'nullable|string',  // Address is optional
            'province_of_domicile' => 'nullable|string|max:255',  // Province of Domicile is optional, max length 255
            'district_of_domicile' => 'nullable|string|max:255',  // District of Domicile is optional, max length 255
            'postal_city' => 'nullable|string|max:255',  // Postal City is optional, max length 255
            'postal_address' => 'nullable|string',  // Postal Address is optional
            'gender' => 'nullable|in:male,female,other',  // Gender is optional, must be one of the predefined options
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Profile Picture is optional, but if provided, must be an image of a specific type and within size limit
        ]);

        // Retrieve the currently authenticated user's profile (candidate)
        $candidate = Auth::user();

        // Update the candidate profile information
        $candidate->first_name = $validated['first_name'];
        $candidate->last_name = $validated['last_name'];
        $candidate->father_name = $validated['father_name'];
        $candidate->phone = $validated['phone'];
        $candidate->address = $validated['address'];
        $candidate->province_of_domicile = $validated['province_of_domicile'];
        $candidate->district_of_domicile = $validated['district_of_domicile'];
        $candidate->postal_city = $validated['postal_city'];  // Add postal_city to the candidate
        $candidate->postal_address = $validated['postal_address'];  // Add postal_address to the candidate
        $candidate->gender = $validated['gender'];
        $candidate->date_of_birth = $validated['date_of_birth'];  // Update date_of_birth if provided
        $candidate->cnic = $validated['cnic'];  // Update CNIC if provided

        // Handle profile picture upload if present
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($candidate->profile_picture) {
                Storage::disk('public')->delete($candidate->profile_picture);
            }

            // Store the new profile picture
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $candidate->profile_picture = $imagePath;
        }

        // Save the updated candidate information
        $candidate->save();

        // Redirect to profile with success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}


