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
        Schema::create('fee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('SPP, Uang Gedung, Seragam, etc');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2)->comment('Base amount');
            $table->enum('frequency', ['monthly', 'semester', 'annual', 'one_time'])->default('monthly');
            $table->boolean('is_mandatory')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('frequency');
            $table->index(['is_active', 'is_mandatory']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_types');
    }
};