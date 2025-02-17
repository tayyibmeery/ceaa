<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Test;
use Illuminate\Http\Request;

class TestResultController extends Controller
{
    public function index()
    {
        // $tests = test::with('application')->get();
        // return view('backend.test.index', compact('tests'));
        $tests = Test::with('jobPost')->get();
        return view('backend.test.index', compact('tests'));
    }

    public function create()
    {
        $jobPosts=JobPost::all();
        return view('backend.test.create', \compact('jobPosts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_post_id' => 'required|integer|exists:job_posts,id|unique:tests,job_post_id',
            'test_date' => 'required|date',
            'test_time' => 'required|date_format:H:i',
            'test_center' => 'required|string|max:255',
        ]);

        try {
            Test::create($request->all());
            return redirect()->route('tests.index')->with('success', 'Test created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while saving the test: ' . $e->getMessage()]);
        }
    }

    public function show(Test $test)
    {

        return view('backend.test.show', compact('test'));
    }

    public function edit(Test $test)
    {
        $jobPosts = JobPost::all();
        return view('backend.test.create', compact('test', 'jobPosts'));
    }

   public function update(Request $request, Test $test)
{
    $request->validate([
        'job_post_id' => [
            'required',
            'integer',
            'exists:job_posts,id',
            Rule::unique('tests', 'job_post_id')->ignore($test->id),
        ],
        'test_date' => 'required|date',
        'test_time' => 'required|date_format:H:i',
        'test_center' => 'required|string|max:255',
    ]);

    try {
        $test->update($request->all());
        return redirect()->route('tests.index')->with('success', 'Test updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred while updating the test: ' . $e->getMessage()]);
    }
}

    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('tests.index')->with('success', 'Test Result deleted successfully.');
    }
}
