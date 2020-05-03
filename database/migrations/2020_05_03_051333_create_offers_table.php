<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("description")->default("");
            $table->text("long_description")->nullable();
            $table->double("discount")->default(0.0);
            $table->double("discount_percent")->default(0.0);
            $table->dateTime("from")->useCurrent();
            $table->dateTime("to")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
