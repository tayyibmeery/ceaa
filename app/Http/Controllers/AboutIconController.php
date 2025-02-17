<?php

namespace App\Http\Controllers;

use App\Models\AboutIcon;
use Illuminate\Http\Request;

class AboutIconController extends Controller
{
    public function index()
    {
        $aboutIcons = AboutIcon::paginate(10);
        return view('backend.abouticons.index', compact('aboutIcons'));
    }

    public function create()
    {
        return view('backend.abouticons.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'about_icon_name' => 'required|string|max:255',
            'about_icon_detail' => 'required|string|max:10000',
        ]);

        AboutIcon::create([
            'about_icon_name' => $request->about_icon_name,
            'about_icon_detail' => $request->about_icon_detail,
        ]);

        return redirect()->route('abouticon.index')->with('success', 'Social Icon created successfully.');
    }

    public function edit($id)
    {
        $aboutIcon = AboutIcon::findOrFail($id);
        return view('backend.abouticons.create', compact('aboutIcon'));
    }

    public function update(Request $request, $id)
    {

        $aboutIcon = AboutIcon::findOrFail($id);

        $request->validate([
            'about_icon_name' => 'required|string|max:255',
            'about_icon_detail' => 'required|string|max:10000',
        ]);

        $aboutIcon->update([
            'about_icon_name' => $request->about_icon_name,
            'about_icon_detail' => $request->about_icon_detail,
        ]);

        return redirect()->route('abouticon.index')->with('success', 'Social Icon updated successfully.');
    }

    public function destroy($id)
    {
        $aboutIcon = AboutIcon::findOrFail($id);
        $aboutIcon->delete();

        return redirect()->route('abouticon.index')->with('success', 'Social Icon deleted successfully.');
    }
}
