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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('e.g., X TKJ 1, XI MM 2');
            $table->string('grade')->comment('X, XI, XII');
            $table->string('major')->comment('TKJ, MM, AK, etc');
            $table->foreignId('homeroom_teacher_id')->nullable()->constrained('users');
            $table->foreignId('academic_year_id')->constrained();
            $table->integer('capacity')->default(36);
            $table->timestamps();
            
            $table->index(['grade', 'major']);
            $table->index('academic_year_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};