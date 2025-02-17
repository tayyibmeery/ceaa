<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        $users = User::paginate(10); // Adjust pagination as needed
        return view('backend.user.index', compact('users'));
    }

    // Show form to create a new user
    public function create()
    {
        return view('backend.user.create');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'cnic' => 'nullable|string|max:15|unique:users,cnic',
            'date_of_birth' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'province_of_domicile' => 'nullable|string|max:255',
            'district_of_domicile' => 'nullable|string|max:255',
            'postal_city' => 'nullable|string|max:255',
            'postal_address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cnic' => $request->cnic,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
            'province_of_domicile' => $request->province_of_domicile,
            'district_of_domicile' => $request->district_of_domicile,
            'postal_city' => $request->postal_city,
            'postal_address' => $request->postal_address,
            'gender' => $request->gender,
            'role' => $request->role,
        ];

        // Handle file upload for profile picture if present
        if ($request->hasFile('profile_picture')) {
            $fileName = $request->file('profile_picture')->store('profile_pictures', 'public');
            $userData['profile_picture'] = $fileName;
        }

        User::create($userData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show user details
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }

    // Show form to edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.create', compact('user'));
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'cnic' => 'nullable|string|max:15|unique:users,cnic,' . $id,
            'date_of_birth' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'province_of_domicile' => 'nullable|string|max:255',
            'district_of_domicile' => 'nullable|string|max:255',
            'postal_city' => 'nullable|string|max:255',
            'postal_address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'email' => $request->email,
            'cnic' => $request->cnic,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
            'province_of_domicile' => $request->province_of_domicile,
            'district_of_domicile' => $request->district_of_domicile,
            'postal_city' => $request->postal_city,
            'postal_address' => $request->postal_address,
            'gender' => $request->gender,
            'role' => $request->role,
        ];

        // Handle file upload for profile picture if present
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $fileName = $request->file('profile_picture')->store('profile_pictures', 'public');
            $userData['profile_picture'] = $fileName;
        }

        // Update password only if provided
        if ($request->password) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete profile picture if exists
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
