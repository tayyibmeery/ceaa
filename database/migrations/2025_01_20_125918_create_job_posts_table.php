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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('title');
            $table->text('description');
            $table->text('requirements');
            $table->date('advertisement_date');
            $table->date('application_deadline');
            $table->string('advertisement_file')->nullable();  // Column to store the file path (PDF or image)
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');  // Status of the job post
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
