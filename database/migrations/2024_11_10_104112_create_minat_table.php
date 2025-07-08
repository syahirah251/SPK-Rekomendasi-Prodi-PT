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
        Schema::create('minats', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'student_id')->constrained('students')->onDelete('cascade'); // Foreign key referencing 'students' table, cascades on delete
            $table->integer('realistik')->nullable();
            $table->integer('investigatif')->nullable();
            $table->integer('artistik')->nullable();
            $table->integer('sosial')->nullable();
            $table->integer('enterprising')->nullable();
            $table->integer('konvensional')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minat');
    }
};
