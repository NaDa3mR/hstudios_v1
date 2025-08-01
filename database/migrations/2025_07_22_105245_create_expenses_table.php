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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('account_id');
            $table->foreignId(column: 'account_id')->constrained('accounts')->onDelete('cascade');
            //$table->unsignedBigInteger('account_id');
            $table->foreignId('expense_source_id')->constrained('expense_sources')->onDelete('cascade');
            $table->string('title');
            $table->decimal('amount', 15, 2);
            $table->date('expense_date');
            $table->text('details')->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
