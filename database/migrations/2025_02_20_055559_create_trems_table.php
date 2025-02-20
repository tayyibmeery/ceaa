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
        Schema::create('trems', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Page name (for nav item)
            $table->string('heading');          // Page name (for nav item)
            $table->string('slug')->unique(); // URL slug
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trems');
    }
};
