<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("label")->default("");
            $table->string("label_color")->default("");
            $table->string("image_url")->default("images/default.jpg");
            $table->text("short_description")->nullable();
            $table->boolean("available")->default(true);
            $table->boolean("displayed")->default(true);
            // $table->foreignId("offer")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
