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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string("first_name",100);
            $table->string("last_name",100);
            $table->string("mobile",20)->nullable();
            $table->string("email",100)->nullable();
            $table->string("state_id",100)->nullable();
            $table->string("city",100)->nullable();
            $table->string("pincode",20)->nullable();
            $table->string("lead_type",100)->nullable();
            $table->string("utm_source",100)->nullable();
            $table->string("utm_campaign",100)->nullable();
            $table->text("utm_device")->nullable();
            $table->text("utm_creative")->nullable();
            $table->text("utm_adgroup")->nullable();
            $table->text("utm_content")->nullable();
            $table->text("utm_adset")->nullable();
            $table->enum('store_area', ['0', '1'])->default('1');
            $table->text('ref_code')->nullable();
            $table->text('source_url')->nullable();
            $table->text('crm_response')->nullable();
            $table->enum('crm_status', ['0', '1'])->default('1');
            $table->enum('otp_status', ['0', '1'])->default('1');
            $table->enum('whatsapp_status', ['0', '1'])->default('1');
            $table->enum('mail_status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
