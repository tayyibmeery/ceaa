<?php

namespace App\Http\Controllers;

use App\Models\Trem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TremController extends Controller{

    public function index()
    {
        $trems = Trem::all();
        return view('backend.trems.index', compact('trems'));
    }

    // Show the form to create a new trem
    public function create()
    {
        return view('backend.trems.create');
    }

    // Store a new trem
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:trems,slug',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Trem::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect()->route('trems.index')->with('success', 'trem created successfully.');
    }

    // Show the form to edit an existing trem
    public function edit(Trem $trem)
    {
        return view('backend.trems.create', compact('trem'));
    }

    // Update an existing trem
    public function update(Request $request, Trem $trem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:trems,slug,' . $trem->id,
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $trem->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect()->route('trems.index')->with('success', 'trem updated successfully.');
    }

    // Delete a trem
    public function destroy(Trem $trem)
    {
        $trem->delete();

        return redirect()->route('trems.index')->with('success', 'trem deleted successfully.');
    }

    // Show a specific trem by its slug
    // public function show($slug)
    // {
    //     $trem = trem::where('slug', $slug)->firstOrFail();
    //     return view('trems.show', compact('trem'));
    // }

}

