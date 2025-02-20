<?php

namespace App\Imports;

use App\Models\Result;
use App\Models\Application;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class ResultsImport implements ToModel, WithHeadingRow
{
    public $errors = []; // Make errors public so it can be accessed later

    public function model(array $row)
    {
        // Find application by user_id and job_post_id
        $application = Application::where('user_id', $row['user_id'])
            ->where('job_post_id', $row['job_post_id'])
            ->first();

        if (!$application) {
            $this->errors[] = "No application found for user_id: {$row['user_id']} and job_post_id: {$row['job_post_id']}";
            return null; // Skip this row
        }

        // Check if result already exists
        $existingResult = Result::where('application_id', $application->id)
            ->where('marks_obtained', $row['marks_obtained'])
            ->where('total_marks', $row['total_marks'])
            ->where('remarks', $row['remarks'] ?? null)
            ->exists();

        if ($existingResult) {
            $this->errors[] = "Duplicate result for user_id: {$row['user_id']} and job_post_id: {$row['job_post_id']}";
            return null; // Skip duplicate entry
        }

        return new Result([
            'application_id' => $application->id,
            'marks_obtained' => $row['marks_obtained'],
            'total_marks' => $row['total_marks'],
            'remarks' => $row['remarks'] ?? null,
        ]);
    }
}
