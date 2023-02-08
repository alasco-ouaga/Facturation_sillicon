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
        Schema::create('invoices', function (Blueprint $table) {

            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('code')->unique();
            $table->string('phone');
            $table->string('amount');
            $table->string('pc_mark');
            $table->string('pc_disk');
            $table->boolean('is_payed');
            $table->string('pc_rame')->nullable();
            $table->string('problem')->nullable();
            $table->boolean('is_connect')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
