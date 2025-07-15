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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('profile_id');
            $table->string('coupon')->nullable();
            $table->integer('amount');
            $table->integer('discount')->nullable();
            $table->string('student_code')->nullable();
            $table->string('money_receipt')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('payment_mode')->nullable();
            $table->enum('status', ['success','pending', 'failed'])->default('pending');
            $table->enum('erp_status', ['0','1'])->default('0');
            $table->text('erp_response')->nullable();
            $table->enum('mail_status', ['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
