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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable(); // Candidate's phone number
            $table->string('father_name')->nullable(); // Candidate's phone number
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user'])->default('user');


            $table->string('cnic')->unique()->nullable(); // Candidate's CNIC with enforced uniqueness
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable(); // Candidate's phone number

            $table->text('address')->nullable(); // Candidate's address
            $table->string('province_of_domicile')->nullable(); // Province of domicile
            $table->string('district_of_domicile')->nullable(); // District of domicile
            $table->string('postal_city')->nullable(); // Candidate's postal city
            $table->text('postal_address')->nullable(); // Postal address
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender field
            $table->string('profile_picture')->nullable(); // Optional profile picture
            $table->index('cnic');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
