<?php

namespace App\Http\Controllers;

use App\Exports\ResultsExport;
use App\Imports\ResultsImport;
use App\Models\Application;
use App\Models\Result;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResultListController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showResult($id)
    {
        $application = Application::with('candidate', 'jobPost.organization')->findOrFail($id);

        if (!$application->result) {
            return redirect()->back()->with('error', 'Result not declared yet.');
        }

        return view('backend.result.show', compact('application'));
    } public function index()
    {
        // Fetch all results
        $results = Result::all();
        return view('backend.result.index', compact('results'));
    }

    public function create()
    {
        // Fetch applications to associate with the result
        $applications = Application::all();
        return view('backend.result.create', compact('applications'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'marks_obtained' => 'required|integer',
            'total_marks' => 'required|integer',
            'remarks' => 'nullable|string',
        ]);

        // Create a new result
        Result::create($request->all());

        return redirect()->route('results.index')->with('success', 'Result created successfully.');
    }

    public function show(Result $result)
    {
        return view('backend.result.show', compact('result'));
    }

    public function edit(Result $result)
    {
        // Fetch applications to associate with the result
        $applications = Application::all();
        return view('backend.result.create', compact('result', 'applications'));
    }

    public function update(Request $request, Result $result)
    {
        // Validation rules
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'marks_obtained' => 'required|integer',
            'total_marks' => 'required|integer',
            'remarks' => 'nullable|string',
        ]);

        // Update the result
        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        // Delete the result
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }


public function results() {
    return view('backend.result.result');
}
    public function uploadResults(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new ResultsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Results uploaded successfully.');
    }

    public function exportResults()
    {
        return Excel::download(new ResultsExport, 'results.xlsx');
    }
}
