<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobPost;
use Carbon\Carbon;

class UpdateJobPostStatus extends Command
{

    // The name and signature of the console command.
    protected $signature = 'jobpost:update-status';

    // The console command description.
    protected $description = 'Update job posts status to "expired" if the application deadline has passed';

    // Execute the console command.
    public function handle()
    {
        // Get all job posts where the application deadline has passed and status is not already expired
        $expiredJobPosts = JobPost::where('application_deadline', '<', Carbon::now())
            ->where('status', '!=', 'expired')
            ->get();

        foreach ($expiredJobPosts as $jobPost) {
            // Update the status of the job post to 'expired'
            $jobPost->status = 'expired';
            $jobPost->is_visible = 0;

            $jobPost->save();
            $this->info("Job post with title {$jobPost->title} has been updated to expired.");
        }
    }
}
