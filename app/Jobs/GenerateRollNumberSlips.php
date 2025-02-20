<?php

namespace App\Jobs;

use App\Models\Application;
use App\Models\RollNumberSlip;
use App\Models\Test;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateRollNumberSlips implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $test;

    /**
     * Create a new job instance.
     */
    public function __construct(Test $test)
    {
        $this->test = $test;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $applications = Application::where('job_post_id', $this->test->job_post_id)->get();

        foreach ($applications as $index => $application) {
            // Check if Roll Number Slip already exists
            if (!RollNumberSlip::where('application_id', $application->id)->exists()) {
                RollNumberSlip::create([
                    'application_id' => $application->id,
                    'test_id' => $this->test->id,
                    'roll_number' => 'ROLL-' . str_pad($application->id, 6, '0', STR_PAD_LEFT),
                    'serial_number' => $index + 1,
                ]);
            }
        }
    }
}
