<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForSubcaste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcaste', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caste_id')->unsigned();
            $table->foreign('caste_id')->references('id')->on('caste');
            $table->string('subcaste_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcaste');
    }
}
