<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyContraintToAddmedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::table('addmedicines', function (Blueprint $table) {
             $table->integer('distributor_id')->unsigned()->after('code');
             $table->foreign('distributor_id')
                                ->references('id')
                                ->on('distributors');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('addmedicines', function (Blueprint $table) {
             $table->dropForeign('addmedicines_distributor_id_foreign');
             $table->dropColumn('distributor_id');
                            
        });
    }
}
