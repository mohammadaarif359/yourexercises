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
        Schema::table('doctor_plans', function (Blueprint $table) {
            $table->integer('avg_rating')->after('created_by')->default(0);
        });
        Schema::table('doctor_profiles', function (Blueprint $table) {
            $table->integer('avg_rating')->after('ye_directory')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_plans', function (Blueprint $table) {
            $table->dropColumn('avg_rating');
        });
        Schema::table('doctor_profiles', function (Blueprint $table) {
            $table->dropColumn('avg_rating');
        });
    }
};
