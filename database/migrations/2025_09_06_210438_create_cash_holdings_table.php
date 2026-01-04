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
        Schema::create('cash_holdings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('previous_day_cash_holding', 12, 2)->default(0);
            $table->decimal('today_total_collection', 12, 2)->default(0);
            $table->decimal('today_total_expenses', 12, 2)->default(0);
            $table->decimal('cash_in_hand', 12, 2)->default(0);
            $table->decimal('cash_in_account', 12, 2)->default(0);
            $table->decimal('cash_in_wallet', 12, 2)->default(0);
            $table->decimal('total_cash', 12, 2)->default(0);
            $table->unsignedBigInteger('created_by'); 
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_holdings');
    }
};
