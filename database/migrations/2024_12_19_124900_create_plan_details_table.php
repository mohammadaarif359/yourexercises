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
        Schema::create('plan_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plan_id');
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('subcategory_id')->nullable();
            $table->bigInteger('exercise_id');
            $table->integer('reps')->nullable();
            $table->integer('hold')->nullable(); // e.g., seconds
            $table->integer('complete')->nullable();
            $table->integer('perform')->nullable(); 
            $table->string('frequency')->nullable(); // e.g., "daily", "weekly", etc.
            $table->string('times')->nullable(); // e.g., "daily", "weekly", etc.
            $table->bigInteger('created_by');
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_details');
    }
};
