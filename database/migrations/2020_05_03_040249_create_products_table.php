<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("name");
            $table->string("image_url")->default("/images/default.jpg");
            $table->text("description")->nullable();
            $table->longText("long_description")->nullable();
            $table->boolean("available")->default(true);
            $table->boolean("displayed")->default(true);
            $table->boolean("vegan")->default(false);
            // $table->foreignId("category")->nullable();
            // $table->foreignId("offer")->nullable();
            $table->string("label")->default("");
            $table->string("label_color")->default("");
            $table->double("price")->default(1.99);
            $table->string("price_label")->default("$");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
