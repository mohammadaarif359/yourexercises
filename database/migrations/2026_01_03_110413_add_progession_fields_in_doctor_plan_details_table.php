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
        Schema::table('doctor_plan_details', function (Blueprint $table) {
            $table->date('start_date')->after('times')->nullable();
            $table->date('next_date')->after('start_date')->nullable();
            $table->date('end_date')->after('next_date')->nullable();
            $table->integer('progression_frequency')->after('end_date')->nullable();
            $table->integer('increase_per')->after('progression_frequency')->nullable();
            $table->integer('apply_rating')->after('increase_per')->nullable();
            $table->longText('progression_history')->after('apply_rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_plan_details', function (Blueprint $table) {
            $table->dropColumn([
                'start_date',
                'next_date',
                'end_date',
                'progression_frequency',
                'increase_per',
                'apply_rating',
                'progression_history'
            ]);
        });
    }
};
