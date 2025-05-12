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
        Schema::table('doctor_exercises', function (Blueprint $table) {
            $table->boolean('is_private')->after('is_active')->default(1); 
        });
        Schema::table('exercises', function (Blueprint $table) {
            $table->bigInteger('doctor_exercise_id')->after('created_by')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_exercises', function (Blueprint $table) {
            $table->dropColumn('is_private');
        });
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn('doctor_exercise_id');
        });
    }
};
