<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RollNumberSlip;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RollNumberSlipsExport;
use Illuminate\Http\Request;
use PDF;

class RollNumberController extends Controller
{
    public function index()
    {
        $rollNumbers = RollNumberSlip::with('application.user', 'application.jobPost', 'test')->paginate(10);
        return view('backend.rollnumberslip.index', compact('rollNumbers'));
    }

    public function show($id)
    {
        $rollNumber = RollNumberSlip::with('application.user', 'application.jobPost', 'test')->findOrFail($id);
        return view('backend.rollnumberslip.show', compact('rollNumber'));
    }

    public function download($id)
    {
        $rollNumber = RollNumberSlip::with('application.user', 'application.jobPost', 'test')->findOrFail($id);
        $pdf = PDF::loadView('backend.rollnumberslip.pdf', compact('rollNumber'));
        return $pdf->download('Roll_Number_Slip_' . $rollNumber->roll_number . '.pdf');
    }

    public function print($id)
    {
        $rollNumber = RollNumberSlip::with('application.user', 'application.jobPost', 'test')->findOrFail($id);
        return view('backend.rollnumberslip.print', compact('rollNumber'));
    }
public function app(){
        return Excel::download(new RollNumberSlipsExport, 'roll_number_slips.xlsx');
}
   
}
