<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint $t) {
            $t->id();
            $t->string('type');
            $t->foreignId('loan_id')->nullable()->constrained()->nullOnDelete();
            $t->date('event_date');
            $t->boolean('read')->default(false);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('notifications'); }
};
