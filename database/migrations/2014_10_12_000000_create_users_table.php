<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('password_reset_key')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('age');
            $table->string('image_url');
            $table->text('notes')->nullable();
            $table->integer('phone');
            $table->text('address');
            $table->string('state');
            $table->integer('role_id');
            $table->dateTime('joined')->useCurrent();
            $table->dateTime('first_ordered')->nullable();
            $table->dateTime('last_ordered')->nullable();
            $table->boolean('is_admin')->default(false);
            // $table->foreignId('rights')->nullable();
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
        Schema::dropIfExists('users');
    }
}
