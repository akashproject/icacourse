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
            $table->string('first_name',100); 
            $table->string('last_name',100); 
            $table->string('guardian_name',100)->nullable(); 
            $table->string('mobile',15); 
            $table->string('email',50); 
            $table->string('date_of_birth',50)->nullable(); 
            $table->string('gender',10)->nullable(); 
            $table->string('qualification')->nullable();
            $table->string('language')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode',10)->nullable();
            $table->timestamps();
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
