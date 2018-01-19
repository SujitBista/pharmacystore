<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddmedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addmedicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('party');
            $table->string('type');
            $table->string('pack');
            $table->string('name');
            $table->string('itemdescription');
            $table->string('qty');
            $table->integer('rate');
            $table->string('expdate');
            $table->string('batchnumber');
            $table->string('mrp');
            $table->rememberToken();
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
        Schema::dropIfExists('addmedicines');
    }
}
