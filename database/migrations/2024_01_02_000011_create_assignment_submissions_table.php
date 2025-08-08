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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users');
            $table->text('content')->nullable()->comment('Text submission');
            $table->json('attachments')->nullable()->comment('File paths for submitted files');
            $table->datetime('submitted_at');
            $table->decimal('score', 5, 2)->nullable()->comment('0-100');
            $table->text('feedback')->nullable();
            $table->foreignId('graded_by')->nullable()->constrained('users');
            $table->datetime('graded_at')->nullable();
            $table->enum('status', ['submitted', 'graded', 'late'])->default('submitted');
            $table->timestamps();
            
            $table->unique(['assignment_id', 'student_id']);
            $table->index('submitted_at');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};