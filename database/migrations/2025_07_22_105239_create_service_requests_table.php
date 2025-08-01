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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->unsignedBigInteger('client_id');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            //$table->unsignedBigInteger('service_id');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string(column: 'status');
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service__requests');
    }
};
