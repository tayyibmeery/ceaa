<?php

namespace App\Http\Controllers;


use App\Exports\ApplicationsExport;
use App\Models\Application;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function exportToExcel(Request $request)
    {

        $jobPostId = $request->job_post_id;
        $applications = Application::query();

        // Apply filter for exporting if job_post_id is provided
        if ($jobPostId) {
            $applications->where('job_post_id', $jobPostId);
        }

        $applications = $applications->get();  // Get filtered applications

        // Pass the filtered applications to the export class
        return Excel::download(new ApplicationsExport($applications), 'applications.xlsx');
        // return Excel::download(new ApplicationsExport, 'applications.xlsx');
    }
}
