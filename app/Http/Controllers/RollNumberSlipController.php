<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RollNumberSlip;
use PDF; // For PDF generation

class RollNumberSlipController extends Controller
{

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

        return view('frontend\roll_slip', compact('rollNumberSlip'));
    }

    public function download($id)
    {
        $rollNumberSlip = RollNumberSlip::findOrFail($id);
        $pdf = \PDF::loadView('pdf.roll-number-slip', compact('rollNumberSlip'));
        return $pdf->download('roll-number-slip.pdf');
    }
}
