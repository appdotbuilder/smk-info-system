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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('teacher_id')->constrained('users');
            $table->string('semester')->comment('1 or 2');
            $table->foreignId('academic_year_id')->constrained();
            $table->enum('grade_type', ['assignment', 'quiz', 'midterm', 'final', 'practical']);
            $table->string('title')->comment('Name of the assessment');
            $table->decimal('score', 5, 2)->comment('0-100');
            $table->decimal('weight', 3, 2)->default(1.00)->comment('Weight for final calculation');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index(['student_id', 'subject_id', 'semester']);
            $table->index(['academic_year_id', 'semester']);
            $table->index('grade_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};