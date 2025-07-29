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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('job_app_id');
            $table->foreignId(column: 'job_application_id')->constrained('job_applications')->onDelete('cascade');
            $table->string('type');
            $table->date('interview_date');
            $table->decimal('duration');
            $table->text('details')->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
