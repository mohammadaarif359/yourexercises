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
        Schema::create('doctor_plan_assigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('doctor_user_id');
            $table->bigInteger('doctor_id')->nullable();
            $table->bigInteger('plan_id');
            $table->bigInteger('exercise_count');
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');
            $table->integer('avg_rating')->default(0);
            $table->dateTime('completed_at')->nullable();
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
        Schema::dropIfExists('doctor_plan_assigns');
    }
};
