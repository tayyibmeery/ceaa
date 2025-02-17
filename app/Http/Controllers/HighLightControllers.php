<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use Illuminate\Http\Request;

class HighLightControllers extends Controller
{
    public function index()
    {
        $highlights = Highlight::paginate(10);
        return view('backend.highlights.index', compact('highlights'));
    }
    public function show(Highlight $highlight)
    {
        return view('backend.highlights.show', compact('highlight'));
    }


    public function create()
    {
        return view('backend.highlights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_name' => 'required|string|max:255',
            'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
        ]);

        $imageName = time() . '.' . $request->icon_image->extension();
        $request->icon_image->move(public_path('highlights'), $imageName);

        Highlight::create([
            'icon_name' => $request->icon_name,
            'icon_image' => 'highlights/' . $imageName,
            'title' => $request->title,
        ]);

        return redirect()->route('lights.index')->with('success', 'Highlight created successfully.');
    }

    public function edit( $highlight)

    {
        $highlight = Highlight::findOrFail($highlight);

        return view('backend.highlights.create', compact('highlight'));
    }

    public function update(Request $request, SocialIcon $socialIcon)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'social_icon_name' => 'required|string|max:255',
            'social_icon_url' => 'required|url|max:255',
            'social_icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Initialize the variable to hold the image path
        $social_icon_image = $socialIcon->social_icon_image;

        // Check if a new image is uploaded
        if ($request->hasFile('social_icon_image')) {
            // Delete the old image if it exists
            if ($socialIcon->social_icon_image && file_exists(public_path($socialIcon->social_icon_image))) {
                unlink(public_path($socialIcon->social_icon_image));
            }

            // Save the new image
            $imageName = time() . '.' . $request->social_icon_image->extension();
            $request->social_icon_image->move(public_path('social_icons'), $imageName);

            // Update the image path
            $social_icon_image = 'social_icons/' . $imageName;
        }

        // Update the record in the database
        $socialIcon->update([
            'title' => $request->title,
            'social_icon_name' => $request->social_icon_name,
            'social_icon_url' => $request->social_icon_url,
            'social_icon_image' => $social_icon_image, // Ensure the updated image path is saved
        ]);

        // Redirect back with a success message
        return redirect()->route('socialicon.index')->with('success', 'Social Icon updated successfully.');
    }



    public function destroy( $highlight)
    {
        $highlight = Highlight::findOrFail($highlight);
        if (!empty($highlight->icon_image) && file_exists(public_path($highlight->icon_image))) {
            unlink(public_path($highlight->icon_image));
        }

        // Delete the highlight from the database
        $highlight->delete();

        // Redirect back with a success message
        return redirect()->route('lights.index')->with('success', 'Highlight deleted successfully.');
    }

}
