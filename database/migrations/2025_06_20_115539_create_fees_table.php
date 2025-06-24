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
        Schema::create('fees', function (Blueprint $table) {
            $table->unsignedBigInteger('FeeID')->primary(); 
            $table->integer('CourseId')->nullable(); 
            $table->integer('AdmissionFees')->nullable(); 
            $table->integer('Course_Fees')->nullable(); 
            $table->text('Details')->nullable(); 
            $table->integer('DiscountAmt')->nullable(); 
            $table->integer('Down_Payment')->nullable(); 
            $table->string('Flag',100)->nullable(); 
            $table->integer('InstType')->nullable(); 
            $table->integer('InstallAmount')->nullable(); 
            $table->string('Install_Payable',10)->nullable(); 
            $table->integer('NoOfInstall')->nullable(); 
            $table->integer('PlacementFee')->nullable(); 
            $table->text('TabletScheme')->nullable(); 
            $table->integer('TotalInstAmt')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
