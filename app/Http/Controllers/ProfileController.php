<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function profileshow()
    {

        $candidate = Auth::user();
        $posts =
            JobPost::active(5)
            ->where('application_deadline', '>', now()) // Ensure the application deadline is in the future
            ->orderBy('application_deadline', 'asc')  // Order by the application deadline in ascending order
            ->get();


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
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'cnic' => ['required', 'string', 'max:15', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9\-\+]{9,15}$/'],
            'address' => 'required|string',
            'province_of_domicile' => 'required|string|max:255',
            'district_of_domicile' => 'required|string|max:255',
            'postal_city' => 'required|string|max:255',
            'postal_address' => 'required|string',
            'password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Education validation
            'educations' => 'nullable|array',
            'educations.*.degree_title' => 'required|string|max:255',
            'educations.*.institute' => 'required|string|max:255',
            'educations.*.board_university' => 'required|string|max:255',
            'educations.*.passing_year' => 'required|integer|min:1950|max:' . (date('Y')),
            'educations.*.grade_cgpa' => 'required|string|max:10',
        ], [
            // Custom validation messages
            'cnic.regex' => 'The CNIC must be in format: XXXXX-XXXXXXX-X',
            'phone.regex' => 'Please enter a valid phone number',
            'date_of_birth.before' => 'Date of birth must be a date before today',
            'educations.*.degree_title.required' => 'The degree title field is required',
            'educations.*.passing_year.min' => 'Please enter a valid passing year',
            'educations.*.passing_year.max' => 'Passing year cannot be in the future',
        ]);

        try {
            \DB::beginTransaction();

            $user = Auth::user();

            // Update basic info
            $user->first_name = $validated['first_name'];
            $user->last_name = $validated['last_name'];
            $user->father_name = $validated['father_name'];
            $user->date_of_birth = $validated['date_of_birth'];
            $user->gender = $validated['gender'];
            $user->cnic = $validated['cnic'];
            $user->phone = $validated['phone'];
            $user->address = $validated['address'];
            $user->province_of_domicile = $validated['province_of_domicile'];
            $user->district_of_domicile = $validated['district_of_domicile'];
            $user->postal_city = $validated['postal_city'];
            $user->postal_address = $validated['postal_address'];

            // Update password if provided
            if ($request->filled('password')) {
                $user->password = Hash::make($validated['password']);
            }

// dd($request);

            if ($request->hasFile('profile_picture')) {
                // dd($request->file('profile_picture'));
                if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                    unlink(public_path($user->profile_picture));
                }
                $uploadPath = public_path('uploads/profile_pictures');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true); // Create directory with full permissions
                }
                $image = $request->file('profile_picture');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
                $image->move($uploadPath, $imageName);
                $user->profile_picture = 'uploads/profile_pictures/' . $imageName;
            }

            $user->save();

            // Handle education records
            if (isset($validated['educations'])) {
                // Delete existing education records
                $user->educations()->delete();

                // Create new education records
                foreach ($validated['educations'] as $educationData) {
                    $user->educations()->create([
                        'degree_title' => $educationData['degree_title'],
                        'institute' => $educationData['institute'],
                        'board_university' => $educationData['board_university'],
                        'passing_year' => $educationData['passing_year'],
                        'grade_cgpa' => $educationData['grade_cgpa'],
                    ]);
                }
            }

            \DB::commit();
            return redirect()->route('profile')->with('success', 'Your profile has been updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \DB::rollback();
            return back()->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check the form for errors and try again.');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()
                ->with('error', 'An unexpected error occurred. Please try again later.')
                ->withInput();
        }
    }
}
