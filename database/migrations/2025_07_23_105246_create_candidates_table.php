<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('career_id');
            // $table->unsignedBigInteger('job_application_id')->nullable();
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            // $table->foreign('job_application_id')->references('id')->on('job_applications')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('linkedin');
            $table->string('github');
            $table->string('behance')->nullable();
            $table->unsignedTinyInteger('is_hired')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
