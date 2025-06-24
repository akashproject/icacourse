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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('type_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('course_video_title')->nullable();
            $table->text('course_video_link')->nullable();
            $table->string('course_video_image')->nullable();
            $table->text('description')->nullable();
            $table->text ('excerpt')->nullable();
            $table->char('duration', 50)->nullable();
            $table->char('no_of_module', 50)->nullable();
            $table->text('criteria')->nullable();
            $table->text('feature')->nullable();
            $table->text('highlights')->nullable();
            $table->string('certification')->nullable();
            $table->integer('number_of_enrolled')->nullable();
            $table->integer('number_of_rating')->nullable();
            $table->string('erp_course_id')->nullable();
            $table->string('display_price')->nullable();
            $table->string('price')->nullable();
            $table->boolean('enable_otp')->default('1');
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('schema')->nullable();
            $table->string('robots',150)->default('index, follow');           
            $table->string('utm_campaign',100)->default('Google-Organic');
            $table->string('utm_source',100)->default('SEO');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
