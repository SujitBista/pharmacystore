<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('addmedicine_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('qty');
            $table->decimal('price');
            $table->longText('customer_comment')->nullable();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            $table->foreign('addmedicine_id')
                ->references('id')
                ->on('addmedicines')
                ->onDelete('cascade');
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
        Schema::table('sales', function (Blueprint $table) {
             $table->dropForeign('sales_customer_id_foreign');
             $table->dropColumn('customer_id'); 
             $table->dropForeign('sales_addmedicine_id_foreign');
             $table->dropColumn('addmedicine_id');  
        });
        Schema::dropIfExists('sales');
    }

}
