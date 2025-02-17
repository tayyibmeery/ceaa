<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_post_id')->constrained()->cascadeOnDelete();
            $table->enum('status', [
                'applied',
                'under_review',
                'test_scheduled',
                'test_completed',
                'result_generated',
                'rejected'
            ])->default('applied');
            $table->string('resume')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('fees_receipt')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamp('submission_date')->useCurrent();
            $table->text('reviewer_remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['user_id', 'job_post_id'], 'unique_candidate_application');
            $table->index(['user_id', 'job_post_id']); // Composite index for performance
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
