<?php

namespace App\Http\Controllers;

use App\Models\SocialIcon;
use Illuminate\Http\Request;

class SocialIconController extends Controller
{
    public function index()
    {
        $socialIcons = SocialIcon::paginate(10);
        return view('backend.socialicons.index', compact('socialIcons'));
    }

    public function create()
    {
        return view('backend.socialicons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'social_icon_name' => 'required|string|max:255',
            'social_icon_url' => 'required|url|max:255',
        ]);

        SocialIcon::create([
            'social_icon_name' => $request->social_icon_name,
            'social_icon_url' => $request->social_icon_url,
        ]);

        return redirect()->route('socialicon.index')->with('success', 'Social Icon created successfully.');
    }

    public function edit($id)
    {
        $socialIcon = SocialIcon::findOrFail($id);
        return view('backend.socialicons.create', compact('socialIcon'));
    }

    public function update(Request $request, $id)
    {
        $socialIcon = SocialIcon::findOrFail($id);

        $request->validate([
            'social_icon_name' => 'required|string|max:255',
            'social_icon_url' => 'required|url|max:255',
        ]);

        $socialIcon->update([
            'social_icon_name' => $request->social_icon_name,
            'social_icon_url' => $request->social_icon_url,
        ]);

        return redirect()->route('socialicon.index')->with('success', 'Social Icon updated successfully.');
    }

    public function destroy($id)
    {
        $socialIcon = SocialIcon::findOrFail($id);
        $socialIcon->delete();

        return redirect()->route('socialicon.index')->with('success', 'Social Icon deleted successfully.');
    }
}
