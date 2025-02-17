<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $destinationPath = public_path('sliders');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $imageName = time() . '.' . $request->slider_image->extension();
        $request->slider_image->move($destinationPath, $imageName);

        $imagePath = 'sliders/' . $imageName;

        Slider::create([
            'welcome_text' => $request->welcome_text,
            'heading' => $request->heading,
            'button_name' => $request->button_name,
            'slider_image' => $imagePath,
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
    }

    public function show(Slider $slider)
    {
        return view('backend.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('backend.sliders.create', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'slider_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('slider_image')) {
            $destinationPath = public_path('sliders');

            // Delete the old image if it exists
            if (file_exists(public_path($slider->slider_image))) {
                unlink(public_path($slider->slider_image));
            }

            // Upload the new image
            $imageName = time() . '.' . $request->slider_image->extension();
            $request->slider_image->move($destinationPath, $imageName);

            // Update the image path
            $slider->slider_image = 'sliders/' . $imageName;
        }

        // Update other fields
        $slider->welcome_text = $request->welcome_text;
        $slider->heading = $request->heading;
        $slider->button_name = $request->button_name;

        // Save the updated slider
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }


    public function destroy(Slider $slider)
    {
        if ($slider->slider_image) {
            Storage::disk('public')->delete($slider->slider_image);
        }
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}
