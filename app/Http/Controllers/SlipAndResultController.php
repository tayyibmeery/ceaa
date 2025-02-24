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

        $user = User::where('cnic', $request->cnic)
            ->with(['educations' => function ($query) {
                $query->orderBy('passing_year', 'desc');
            }])
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Get all upcoming tests for the user
        $upcomingTests = RollNumberSlip::with(['test', 'application.jobPost'])
            ->whereHas('application', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->whereHas('test', function ($query) {
                $query->where('test_date', '>=', now()->startOfDay());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.roll_slip', compact('user', 'upcomingTests'));
    }

    public function download($id)
    {
        $rollNumberSlip = RollNumberSlip::with(['application.user', 'application.jobPost', 'test'])
            ->findOrFail($id);
        // return View('pdf.roll-number-slip', compact('rollNumberSlip'));
        $pdf = PDF::loadView('pdf.roll-number-slip', compact('rollNumberSlip'))->setPaper('a4', 'portrait');;

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

        // Find result with all necessary relationships
        $result = Result::with([
            'application.user',
            'application.jobPost',
            'application.tests'
        ])->whereHas('application', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();
     

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
