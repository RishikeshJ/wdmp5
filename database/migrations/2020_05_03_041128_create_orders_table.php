<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->foreignId("user")->nullable();
            // $table->foreignId("offer")->nullable();
            $table->double("price", 8, 2)->default(0.0);
            $table->double("final_price", 8, 2)->default(0.0);
            $table->double("discount")->default(0.0);
            $table->double("tax")->default(0.0);
            $table->dateTime("datetime", 0)->useCurrent();
            $table->boolean("pickup")->default(true);
            $table->boolean("delivery")->default(false);
            $table->string("address")->default("None");
            $table->dateTime("delivery_datetime")->useCurrent();
            $table->boolean("fulfilled")->default(false);
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
