<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('default.png');
            $table->string('email')->unique();
            $table->string('password');
        });

        Schema::create('user_favorites', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_barber');
        });

        Schema::create('user_appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_barber');
            $table->datetime('ap_datetime');
        });

        Schema::create('barbers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('default.png');
            $table->float('stars')->default(0);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
        });

        Schema::create('barber_photos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barber');
            $table->string('url');
        });

        Schema::create('barber_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barber');
            $table->float('rate');
        });

        Schema::create('barber_services', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barber');
            $table->string('name');
            $table->float('price');
        });

        Schema::create('barber_testimonials', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barber');
            $table->string('name');
            $table->float('rate');
            $table->string('body');
        });

        Schema::create('barber_availabilities', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barber');
            $table->integer('weekday');
            $table->text('hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_favorites');
        Schema::dropIfExists('user_appointments');
        Schema::dropIfExists('barbers');
        Schema::dropIfExists('barber_photos');
        Schema::dropIfExists('barber_reviews');
        Schema::dropIfExists('barber_services');
        Schema::dropIfExists('barber_testimonials');
        Schema::dropIfExists('barber_availabilities');
    }
}
