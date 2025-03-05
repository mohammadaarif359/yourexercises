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
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('clinic_name');
            $table->string('slug');
			$table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->text('clinic_address');
            $table->text('description')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('clinic_phone_no')->nullable();
            $table->longText('professional_info')->nullable();
            $table->longText('social_media')->nullable();
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
        Schema::dropIfExists('doctor_profiles');
    }
};
