<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('ledger_entries', function (Blueprint $t) {
            $t->id();
            $t->foreignId('loan_id')->constrained()->cascadeOnDelete();
            $t->date('entry_date');
            $t->string('invoice_number');
            $t->enum('type', ['CR','DR']);
            $t->decimal('amount', 12, 2);
            $t->string('note')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('ledger_entries'); }
};
