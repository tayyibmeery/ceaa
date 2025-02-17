<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    public function index()
    {
        $services = OurService::all();
        return view('backend.ourservises.index', compact('services'));
    }

    public function create()
    {
        return view('backend.ourservises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        OurService::create($request->all());

        return redirect()->route('ourservices.index')->with('success', 'Service created successfully.');
    }

    public function edit(OurService $ourService)
    {
        return view('backend.ourservises.edit', compact('ourService'));
    }

    public function update(Request $request, OurService $ourService)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ourService->update($request->all());

        return redirect()->route('ourservices.index')->with('success', 'Service updated successfully.');
    }

    public function destroy( $ourService)
    {
        $Service=OurService::find($ourService);
        $Service->delete();

        return redirect()->route('ourservices.index')->with('success', 'Service deleted successfully.');
    }
}
