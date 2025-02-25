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
        Schema::create('doctor_exercises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exercise_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('reps')->nullable();
            $table->integer('hold')->nullable(); // e.g., seconds
            $table->integer('complete')->nullable();
            $table->integer('perform')->nullable(); 
            $table->string('frequency')->nullable(); // e.g., "daily", "weekly", etc.
            $table->string('times')->nullable(); // e.g., "daily", "weekly", etc.
            $table->boolean('is_active')->default(1);
            $table->bigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_exercises');
    }
};
