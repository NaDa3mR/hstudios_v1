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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('account_id');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            //$table->unsignedBigInteger('income_source_id');
            $table->foreignId('income_source_id')->constrained('income_sources')->onDelete('cascade');
            $table->string('title');
            $table->decimal('amount', 15, 2);
            $table->date('income_date');
            $table->text('details')->nullable();                                                                                                           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
