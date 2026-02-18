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
            $table->string('progession_status')->after('progression_history')->nullable();
            $table->date('progession_last_update')->after('progession_status')->nullable();
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
                'progession_status',
                'progession_last_update'
            ]);
        });
    }
};
