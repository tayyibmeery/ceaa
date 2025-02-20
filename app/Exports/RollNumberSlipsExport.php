<?php

namespace App\Exports;

use App\Models\RollNumberSlip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RollNumberSlipsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RollNumberSlip::with('application.user', 'application.jobPost', 'test')
            ->get()
            ->map(function ($rollNumber) {
                return [
                    'Roll Number' => $rollNumber->roll_number,
                    'Serial Number' => $rollNumber->serial_number,
                    'Candidate Name' => $rollNumber->application->user->full_name,
                    'CNIC' => $rollNumber->application->user->cnic,
                    'Test Center' => $rollNumber->test->test_center ?? 'N/A',
                    'Test Date' => $rollNumber->test->test_date ?? 'N/A',
                ];
            });
    }

    public function headings(): array
    {
        return ['Roll Number', 'Serial Number', 'Candidate Name', 'CNIC', 'Test Center', 'Test Date'];
    }
}
