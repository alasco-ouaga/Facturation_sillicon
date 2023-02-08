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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('locality');
            $table->string('info_locality')->nullable();
            $table->string('gps')->nullable();
            $table->string('object');
            $table->string('web_link')->nullable();
            $table->string('img_name');
            $table->string('img_link')->nullable();
            $table->string('email')->unique();
            $table->string('Postal_code')->unique();
            $table->string('country_sigle');
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
        Schema::dropIfExists('company');
    }
};
