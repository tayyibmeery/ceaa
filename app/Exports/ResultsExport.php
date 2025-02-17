<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Result::with('application')->get()->map(function ($result) {
            return [
                'user_id' => $result->application->user_id ?? 'N/A',
                'job_post_id' => $result->application->job_post_id ?? 'N/A',
                'marks_obtained' => $result->marks_obtained,
                'total_marks' => $result->total_marks,
                'remarks' => $result->remarks ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return ['User ID', 'Job Post ID', 'Marks Obtained', 'Total Marks', 'Remarks'];
    }
}
