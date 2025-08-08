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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('student_number')->unique();
            $table->string('nis')->unique()->comment('Nomor Induk Siswa');
            $table->string('nisn')->unique()->comment('Nomor Induk Siswa Nasional');
            $table->foreignId('class_id')->nullable()->constrained();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['male', 'female']);
            $table->string('religion');
            $table->text('parent_info')->nullable()->comment('JSON data for parent information');
            $table->date('enrollment_date');
            $table->enum('status', ['active', 'graduated', 'dropped_out', 'transferred'])->default('active');
            $table->timestamps();
            
            $table->index('student_number');
            $table->index('nis');
            $table->index('nisn');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};