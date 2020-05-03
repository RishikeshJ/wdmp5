<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign("category")->references("id")->on("product_categories");
            

            $table->unsignedBigInteger('offer')->nullable();
            $table->foreign("offer")->references("id")->on("offers");
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user')->nullable();
            $table->foreign("user")->references("id")->on("users");
            $table->unsignedBigInteger('offer')->nullable();
            $table->foreign("offer")->references("id")->on("offers");
            
        });


        Schema::table('product_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('offer')->nullable();
            $table->foreign("offer")->references("id")->on("offers");
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('rights')->nullable();
            $table->foreign("rights")->references("id")->on("rights");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
