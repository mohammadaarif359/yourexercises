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
        Schema::create('plan_assign_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assign_id');
            $table->bigInteger('plan_id');
            $table->bigInteger('exercise_id');
			$table->integer('rating')->default(0);
			$table->longText('title');
            $table->longText('comment');
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
        Schema::dropIfExists('plan_assign_feedbacks');
    }
};
