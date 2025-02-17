<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ApplicationsExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

     protected $applications;

    public function __construct($applications)
    {
        $this->applications = $applications;
    }

    // public function collection()
    // {
    //     // Fetch the required data from the database, including related models
    //     return Application::with(['candidate.user', 'jobPost.organization'])
    //         ->select(
    //             'applications.id',
    //             'applications.status',
    //             'applications.created_at',
    //             'applications.highest_qualification',
    //              'applications.reviewer_remarks',
    //             'applications.payment_status',
    //             'applications.fees_receipt',
    //             'applications.job_post_id',
    //             'applications.candidate_id',
    //             'applications.submission_date'
    //         )
    //         ->get()
    //         ->map(function ($application) {
    //             return [
    //                 'Application ID' => $application->id,
    //                 'Candidate Name' => $application->candidate->name ?? 'N/A',
    //             'Candidate ID' => $application->candidate->id,
    //                 'Candidate Email' => $application->candidate->user->email ?? 'N/A',
    //                 'Job Post Title' => $application->jobPost->title ?? 'N/A',
    //             'Job Post ID' => $application->jobPost->id,
    //                 'Job Post Organization' => $application->jobPost->organization->name ?? 'N/A',
    //               'Organization ID' => $application->jobPost->organization->id ?? 'N/A',
    //                 'Status' => ucfirst(str_replace('_', ' ', $application->status)),
    //                 'Submission Date' => $application->created_at->format('d-m-Y'),
    //                 'Highest Qualification' => $application->highest_qualification ?? 'N/A',
    //                 'Reviewer Remarks' => $application->reviewer_remarks ?? 'N/A',
    //                 'Payment Status' => ucfirst($application->payment_status),
    //                 'Fees Receipt' => $application->fees_receipt ?? 'N/A',
    //                 'Candidate CNIC' => $application->candidate->cnic ?? 'N/A',
    //                 'Candidate Phone' => $application->candidate->phone ?? 'N/A',
    //                 'Test Date' => $application->test ? $application->test->test_date->format('d-m-Y') : 'N/A',
    //                 'Test Time' => $application->test ? $application->test->test_time : 'N/A',
    //                 'Test Center' => $application->test ? $application->test->test_center : 'N/A',
    //             ];
    //         });
    // }
    public function collection()
    {
        return $this->applications->map(function ($application) {
            return [
                'Application ID' => $application->id,
                'Candidate Name' => ($application->user->first_name ?? 'N/A') . ' ' .
                ($application->user->last_name ?? 'N/A') .
                ' S/O ' .
                    ($application->user->father_name ?? 'N/A'),
                'Candidate ID' => $application->user->id,
                'Candidate Email' => $application->user->email ?? 'N/A',
                'Job Post Title' => $application->jobPost->title ?? 'N/A',
                'Job Post ID' => $application->jobPost->id,
                'Job Post Organization' => $application->jobPost->organization_name ?? 'N/A',

                'Status' => ucfirst(str_replace('_', ' ', $application->status)),
                'Submission Date' => $application->created_at->format('d-m-Y'),
                'Highest Qualification' => $application->highest_qualification ?? 'N/A',
                'Reviewer Remarks' => $application->reviewer_remarks ?? 'N/A',
                'Payment Status' => ucfirst($application->payment_status),
                'Fees Receipt' => $application->fees_receipt ?? 'N/A',
                'Candidate CNIC' => $application->user->cnic ?? 'N/A',
                'Candidate Phone' => $application->user->phone ?? 'N/A',
                // 'Test Date' => $application->test ? $application->test->test_date->format('d-m-Y') : 'N/A',
                // 'Test Date' => ($application->test && $application->test->test_date) ? $application->test->test_date: 'N/A',

                // 'Test Time' => $application->test ? $application->test->test_time : 'N/A',
                // 'Test Center' => $application->test ? $application->test->test_center : 'N/A',
                'Test Date' => $application->jobPost->test->test_date ?? 'N/A',
                'Test Time' => $application->jobPost->test->test_time ?? 'N/A',
                'Test Center' => $application->jobPost->test->test_center ?? 'N/A',

            ];
        });
    }
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Application ID',
            'Candidate Name',
            'Candidate ID',
            'Candidate Email',
            'Job Post Title',
            'Job Post ID',
            'Job Post Organization',

            'Status',
            'Submission Date',
            'Highest Qualification',
            'Reviewer Remarks',
            'Payment Status',
            'Fees Receipt',
            'Candidate CNIC',
            'Candidate Phone',
            'Test Date',
            'Test Time',
            'Test Center',
        ];
    }

    /**
     * @return array
     */
    public function styles($sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    /**
     * @return array
     */
    // public function columnFormats(): array
    // {
    //     return [
    //         'A' => NumberFormat::FORMAT_TEXT, // Application ID column
    //         'B' => NumberFormat::FORMAT_TEXT, // Candidate Name
    //         'C' => NumberFormat::FORMAT_TEXT, // Candidate Email
    //         'D' => NumberFormat::FORMAT_TEXT, // Job Post Title
    //         'E' => NumberFormat::FORMAT_TEXT, // Job Post Organization
    //         'F' => NumberFormat::FORMAT_TEXT, // Status
    //         'G' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Submission Date
    //         'H' => NumberFormat::FORMAT_TEXT, // Highest Qualification
    //         'I' => NumberFormat::FORMAT_TEXT, // Reviewer Remarks
    //         'J' => NumberFormat::FORMAT_TEXT, // Payment Status
    //         'K' => NumberFormat::FORMAT_TEXT, // Fees Receipt
    //         'L' => NumberFormat::FORMAT_TEXT, // Candidate CNIC
    //         'M' => NumberFormat::FORMAT_TEXT, // Candidate Phone
    //         'N' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Test Date
    //         'O' => NumberFormat::FORMAT_TEXT, // Test Time
    //         'P' => NumberFormat::FORMAT_TEXT, // Test Center
    //     ];
    // }
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT, // Application ID column
            'B' => NumberFormat::FORMAT_TEXT, // Candidate Name
            'C' => NumberFormat::FORMAT_TEXT, // Candidate ID
            'D' => NumberFormat::FORMAT_TEXT, // Candidate Email
            'E' => NumberFormat::FORMAT_TEXT, // Job Post Title
            'F' => NumberFormat::FORMAT_TEXT, // Job Post Organization
            'G' => NumberFormat::FORMAT_TEXT, // Status
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Submission Date
            'I' => NumberFormat::FORMAT_TEXT, // Highest Qualification
            'J' => NumberFormat::FORMAT_TEXT, // Reviewer Remarks
            'K' => NumberFormat::FORMAT_TEXT, // Payment Status
            'L' => NumberFormat::FORMAT_TEXT, // Fees Receipt
            'M' => NumberFormat::FORMAT_TEXT, // Candidate CNIC
            'N' => NumberFormat::FORMAT_TEXT, // Candidate Phone
            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Test Date
            'P' => NumberFormat::FORMAT_TEXT, // Test Time
            'Q' => NumberFormat::FORMAT_TEXT, // Test Center
        ];
    }

}
