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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_code')->unique();
            $table->foreignId('student_id')->constrained('users');
            $table->json('fee_items')->comment('Array of student_fee_ids being paid');
            $table->decimal('amount', 10, 2);
            $table->enum('method', ['cash', 'bank_transfer', 'online_payment', 'mobile_banking'])->default('cash');
            $table->string('reference_number')->nullable()->comment('Bank reference or payment gateway ID');
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->datetime('paid_at')->nullable();
            $table->foreignId('processed_by')->nullable()->constrained('users');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('payment_code');
            $table->index(['student_id', 'status']);
            $table->index(['paid_at', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};