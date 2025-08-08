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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('class_id')->constrained();
            $table->datetime('due_date');
            $table->integer('max_score')->default(100);
            $table->json('attachments')->nullable()->comment('File paths for assignment materials');
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->timestamps();
            
            $table->index(['class_id', 'due_date']);
            $table->index(['teacher_id', 'status']);
            $table->index('subject_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};