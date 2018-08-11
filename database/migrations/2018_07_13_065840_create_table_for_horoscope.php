<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForHoroscope extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscope', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('raasi_sun');
            $table->integer('raasi_moon');
            $table->integer('raasi_mars');
            $table->integer('raasi_mercury');
            $table->integer('raasi_jupiter');
            $table->integer('raasi_venus');
            $table->integer('raasi_saturn');
            $table->integer('raasi_raagu');
            $table->integer('raasi_kethu');
            $table->integer('raasi_lagna');
            $table->integer('amsam_sun');
            $table->integer('amsam_moon');
            $table->integer('amsam_mars');
            $table->integer('amsam_mercury');
            $table->integer('amsam_jupiter');
            $table->integer('amsam_venus');
            $table->integer('amsam_saturn');
            $table->integer('amsam_raagu');
            $table->integer('amsam_kethu');
            $table->integer('amsam_lagna');
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
        Schema::dropIfExists('horoscope');
    }
}
