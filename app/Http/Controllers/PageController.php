<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('backend.pages.index', compact('pages'));
    }

    // Show the form to create a new page
    public function create()
    {
        return view('backend.pages.create');
    }

    // Store a new page
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Page::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    // Show the form to edit an existing page
    public function edit(Page $page)
    {
        return view('backend.pages.create', compact('page'));
    }

    // Update an existing page
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $page->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    // Delete a page
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }

    // Show a specific page by its slug
    // public function show($slug)
    // {
    //     $page = Page::where('slug', $slug)->firstOrFail();
    //     return view('pages.show', compact('page'));
    // }

}

