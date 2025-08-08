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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('fee_type_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
            $table->string('month')->nullable()->comment('For monthly fees: 01, 02, ..., 12');
            $table->decimal('amount', 10, 2);
            $table->date('due_date');
            $table->enum('status', ['unpaid', 'partial', 'paid', 'overdue'])->default('unpaid');
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->timestamps();
            
            $table->unique(['student_id', 'fee_type_id', 'academic_year_id', 'month']);
            $table->index(['student_id', 'status']);
            $table->index(['due_date', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};