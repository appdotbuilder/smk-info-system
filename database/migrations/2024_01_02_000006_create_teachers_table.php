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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('employee_number')->unique();
            $table->string('nip')->nullable()->unique()->comment('Nomor Induk Pegawai');
            $table->string('nuptk')->nullable()->unique()->comment('Nomor Unik Pendidik dan Tenaga Kependidikan');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['male', 'female']);
            $table->string('education_level');
            $table->string('subject_specialization')->nullable();
            $table->date('hire_date');
            $table->enum('employment_status', ['permanent', 'contract', 'honorary'])->default('contract');
            $table->timestamps();
            
            $table->index('employee_number');
            $table->index('nip');
            $table->index('employment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};