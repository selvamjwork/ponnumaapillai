<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForSmsStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender_id');
            $table->string('message_id');
            $table->string('sent_time');
            $table->string('delivered_time');
            $table->string('operator');
            $table->string('dest_num');
            $table->string('status');
            $table->string('status_code');
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
        Schema::dropIfExists('sms_status');
    }
}
