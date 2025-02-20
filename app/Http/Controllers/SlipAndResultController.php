<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RollNumberSlip;
use PDF; // For PDF generation

class SlipAndResultController extends Controller
{
    public function index()
    {
        return view('frontend.roll_slip_index');
    }
    public function search(Request $request)
    {

        $request->validate([
            'cnic' => 'required|string',
        ]);
        $user = User::where('cnic', $request->cnic)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $rollNumberSlip = RollNumberSlip::whereHas('application', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        if (!$rollNumberSlip) {
            return redirect()->back()->with('error', 'Roll number slip not found.');
        }

        return view('frontend.roll_slip', compact('rollNumberSlip'));
    }

    public function download($id)
    {
        $rollNumberSlip = RollNumberSlip::findOrFail($id);
        $pdf = \PDF::loadView('pdf.roll-number-slip', compact('rollNumberSlip'));
        return $pdf->download('roll-number-slip.pdf');
    }



    public function resultindex()
    {
        return view('frontend.result_index');
    }



    public function searchresult(Request $request)
    {

        $request->validate([
            'cnic' => 'required|string',
        ]);
        $user = User::where('cnic', $request->cnic)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Find result based on the user's application
        $result = Result::whereHas('application', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first(); // Use `get()` if multiple results should be retrieved

        if (!$result) {
            return redirect()->back()->with('error', 'Result not found.');
        }

        return view('frontend.result', compact('result'));

    }

    public function downloadresult($id)
    {

        $result = Result::findOrFail($id);
        $pdf = \PDF::loadView('pdf.result-card', compact('result'));
        return $pdf->download('result-card.pdf');
    }
}
