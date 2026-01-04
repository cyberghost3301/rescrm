<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('loan_id')->constrained()->cascadeOnDelete();
            $t->date('due_date');
            $t->date('posted_at');
            $t->decimal('amount', 12, 2)->default(0);
            $t->boolean('is_late')->default(false);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('payments'); }
};
