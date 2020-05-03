<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean("can_modify_user")->default(false);
            $table->boolean("can_modify_order")->default(false);
            $table->boolean("can_modify_customer_query")->default(false);

            $table->boolean("can_delete_user")->default(false);
            $table->boolean("can_delete_order")->default(false);
            $table->boolean("can_delete_customer_query")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rights');
    }
}
