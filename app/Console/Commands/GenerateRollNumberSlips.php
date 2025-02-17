<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Application;
use App\Models\Test;
use App\Models\RollNumberSlip;
use Carbon\Carbon;

class GenerateRollNumberSlips extends Command
{
    protected $signature = 'generate:roll-number-slips';
    protected $description = 'Generate roll number slips for applicants with paid payment status and scheduled tests.';

    public function handle()
    {

        // Get tests that are scheduled for today or in the future
        $tests = Test::where('test_date', '>=', Carbon::today())->get();

        foreach ($tests as $test) {
            // Get applications with payment_status = 'paid' and status = 'test_scheduled'
            $applications = Application::where('job_post_id', $test->job_post_id)
                ->where('payment_status', 'paid')
                ->where('status', 'test_scheduled')
                ->get();

            foreach ($applications as $application) {
                // Generate a unique roll number
                $rollNumber = 'RN' . str_pad($application->id, 6, '0', STR_PAD_LEFT);

                // Create roll number slip
                RollNumberSlip::create([
                    'application_id' => $application->id,
                    'test_id' => $test->id,
                    'roll_number' => $rollNumber,
                    'serial_number' => 'SN' . str_pad($application->id, 6, '0', STR_PAD_LEFT),
                ]);
            }
        }

        $this->info('Roll number slips generated successfully.');
    }
}
