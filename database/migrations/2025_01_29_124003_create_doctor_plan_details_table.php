<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_plan_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_plan_id');
            $table->bigInteger('plan_detail_id')->nullable();
            $table->bigInteger('doctor_exercise_id');
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('subcategory_id')->nullable();
            $table->integer('reps')->nullable();
            $table->integer('hold')->nullable(); // e.g., seconds
            $table->integer('complete')->nullable();
            $table->integer('perform')->nullable(); 
            $table->string('frequency')->nullable(); // e.g., "daily", "weekly", etc.
            $table->string('times')->nullable(); // e.g., "daily", "weekly", etc.
            $table->bigInteger('created_by');
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('doctor_plan_id')->references('id')->on('doctor_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_plan_details');
    }
};
