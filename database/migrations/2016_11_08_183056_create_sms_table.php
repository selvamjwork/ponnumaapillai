<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('to_mobile_no')->nullable();
            $table->string('message');
            $table->integer('sender_id')->index();
            $table->string('response_mgs_id')->nullable();
            $table->string('role')->default('user');
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
        Schema::drop('sms');
    }
}
