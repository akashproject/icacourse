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
        Schema::create('placements', function (Blueprint $table) {
            $table->id();
            $table->integer('featured_image')->nullable();
            $table->string('name');
            $table->integer('course_id')->nullable();
            $table->string('dasignation',100)->nullable();
            $table->string('placed_at',100)->nullable();
            $table->string('joining_salary',50)->nullable();
            $table->integer('university_id')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placements');
    }
};
