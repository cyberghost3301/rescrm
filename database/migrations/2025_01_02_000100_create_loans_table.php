<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('loans', function (Blueprint $t) {
            $t->id();
            $t->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $t->string('invoice_number');
            $t->date('sale_date');
            $t->date('closure_date');
            $t->enum('weekly_installment_day', ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']);
            $t->decimal('billed_amount', 12, 2);
            $t->decimal('cash_payment', 12, 2)->default(0);
            $t->decimal('online_payment', 12, 2)->default(0);
            $t->decimal('scrap_value', 12, 2)->default(0);
            $t->decimal('total_payment', 12, 2);
            $t->decimal('financed_amount', 12, 2);
            $t->unsignedInteger('finance_period_weeks');
            $t->decimal('weekly_installment_amount', 12, 2);
            $t->unsignedInteger('weekly_skipped_installments')->default(0);
            $t->decimal('non_payment_penalty', 12, 2)->default(0);
            $t->decimal('late_payment_penalty', 12, 2)->default(0);
            $t->decimal('total_amount_collected', 12, 2)->default(0);
            $t->decimal('total_amount_remaining', 12, 2)->default(0);
            $t->unsignedTinyInteger('consecutive_missed_weeks')->default(0);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('loans'); }
};
