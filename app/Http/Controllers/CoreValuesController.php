<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValuesController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::all();
        return view('backend.corevalues.index', compact('coreValues'));
    }

    public function create()
    {
        return view('backend.corevalues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        // Upload image if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('core_values'), $imageName);
            $imagePath = 'core_values/' . $imageName;
        }

        CoreValue::create([
            'heading' => $request->heading,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('corevalues.index')->with('success', 'Core Value created successfully.');
    }

    public function edit( $coreValue)
    {
        $coreValue=CoreValue::find($coreValue);
        if (!$coreValue) {
            return redirect()->route('corevalues.index')->with('error', 'Core Value not found.');
        }
        return view('backend.corevalues.create', compact('coreValue'));
    }

    public function update(Request $request, $coreValue)
    {
        // Find the CoreValue by ID
        $coreValue = CoreValue::find($coreValue);

        // If not found, redirect with an error message
        if (!$coreValue) {
            return redirect()->route('corevalues.index')->with('error', 'Core Value not found.');
        }

        // Validate the incoming request
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image update if file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($coreValue->image && file_exists(public_path($coreValue->image))) {
                unlink(public_path($coreValue->image)); // Remove the old image file
            }

            // Generate a new image name and store it
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('core_values'), $imageName); // Store image in public/core_values directory

            // Update the image path in the database
            $coreValue->image = 'core_values/' . $imageName;
        }

        // Update other fields (heading and description)
        $coreValue->heading = $request->heading;
        $coreValue->description = $request->description;

        // Save the updated record
        $coreValue->save();

        // Redirect back with a success message
        return redirect()->route('corevalues.index')->with('success', 'Core Value updated successfully.');
    }

    public function destroy( $coreValue)
    {
        $coreValue = CoreValue::find($coreValue);
        // Delete image if exists
        if ($coreValue->image && file_exists(public_path($coreValue->image))) {
            unlink(public_path($coreValue->image));
        }

        $coreValue->delete();

        return redirect()->route('corevalues.index')->with('success', 'Core Value deleted successfully.');
    }
}
