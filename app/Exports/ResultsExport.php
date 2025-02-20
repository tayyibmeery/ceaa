<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Result::with(['application.user', 'application.jobPost', 'application.tests', 'application.rollNumberSlip'])
            ->get()
            ->map(function ($result) {
                return [
                    'user_id' => $result->application->user_id ?? 'N/A',
                    'name' => $result->application->user->FullName,
                'roll_number' => $result->application->rollNumberSlip->roll_number,
                    'job_post_id' => $result->application->job_post_id ?? 'N/A',
                    'organization_name' => $result->application->jobPost->organization_name,
                    'job_post_title' => $result->application->jobPost->title,
                    'test_date' => optional($result->application->tests)->test_date,
                    'test_center' => optional($result->application->tests)->test_center,
                    'cnic' => $result->application->user->cnic,
                    'marks_obtained' => $result->marks_obtained,
                    'total_marks' => $result->total_marks,
                    'remarks' => $result->remarks,

                ];
            });
    }

    public function headings(): array
    {
        return [
            'User ID',
            'Full Name',
            'Roll No',
            'Job Post ID',
            'Organization Name',
            'Job Post Title',
            'Test Date',
            'Test Center',
            'CNIC',
            'Marks Obtained',
            'Total Marks',
            'Remarks',
        ];
    }
}
