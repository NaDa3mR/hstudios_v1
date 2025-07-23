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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('account_id_from');
            // $table->foreignId(column: 'account_id_from')->constrained('accounts')->onDelete('cascade');
            // $table->unsignedBigInteger('account_id_to');
            // $table->foreignId(column: 'account_id_to')->constrained('accounts')->onDelete('cascade');
            $table->string('title');
            $table->decimal('amount', 15, 2);
            $table->date('transfer_date');
            $table->text('details')->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
