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
        Schema::create('bakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'student_id')->constrained('students')->onDelete('cascade'); // Foreign key referencing 'students' table, cascades on delete
            
            $table->integer('linguistik')->nullable();
            $table->integer('logis_matematis')->nullable();
            $table->integer('visual_spasial')->nullable();
            $table->integer('musikal')->nullable();
            $table->integer('kinestetik')->nullable();
            $table->integer('interpersonal')->nullable();
            $table->integer('intrapersonal')->nullable();
            $table->integer('naturalis')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bakat');
    }
};
