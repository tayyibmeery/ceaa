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


        $filePath = null;
        if ($request->hasFile('slider_image')) {
            $uploadDirectory = 'uploads/slider_image';
            $uploadPath = public_path($uploadDirectory);
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true); // Create directory with full permissions
            }
            $fileName = time() . '_' . $request->file('slider_image')->getClientOriginalName();
            $request->file('slider_image')->move($uploadPath, $fileName);

            $filePath = $uploadDirectory . '/' . $fileName;
        }




        Slider::create([
            'welcome_text' => $request->welcome_text,
            'heading' => $request->heading,
            'button_name' => $request->button_name,
            'slider_image' => $filePath,
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



        if ($request->hasFile('slider_image')) {
            if ($slider->slider_image && file_exists(public_path($slider->slider_image))) {
                unlink(public_path($slider->slider_image));
            }

            $uploadDirectory = 'uploads/slider_image';
            $uploadPath = public_path($uploadDirectory);
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $fileName = time() . '_' . $request->file('slider_image')->getClientOriginalName();
            $request->file('slider_image')->move($uploadPath, $fileName);
            $filePath = $uploadDirectory . '/' . $fileName;
        } else {
            $filePath = $slider->slider_image;
        }

        // Update other fields
        $slider->slider_image = $filePath;
        $slider->welcome_text = $request->welcome_text;
        $slider->heading = $request->heading;
        $slider->button_name = $request->button_name;

        // Save the updated slider
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }


    public function destroy(Slider $slider)
    {
       
        if ($slider->slider_image && file_exists(public_path($slider->slider_image))) {
            unlink(public_path($slider->slider_image));
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}
