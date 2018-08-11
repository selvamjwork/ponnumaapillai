<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_id')->nullable()->unique();
            $table->string('name');
            $table->string('fathers_name')->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('gender')->length(10);
            $table->integer('noofbrothers')->index()->default(0);
            $table->integer('noofbrothersstatus')->index()->default(0);
            $table->integer('noofsisters')->index()->default(0);
            $table->integer('noofsistersstatus')->index()->default(0);
            $table->integer('month');
            $table->integer('day');
            $table->integer('year');
            $table->integer('age')->nullable();
            $table->string('hour')->nullable();
            $table->string('minutes')->nullable();
            $table->string('seconds')->nullable();
            $table->string('session')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->integer('graduate')->index()->default(0);
            $table->string('qualification')->nullable();
            $table->string('annual_income')->nullable();
            $table->integer('professional')->index()->default(0);
            $table->integer('mother_tongue')->index()->default(0);
            $table->string('religion')->nullable();
            $table->integer('caste')->index()->default(0);
            $table->integer('subsect')->index()->default(0);
            $table->string('gothram')->nullable();
            $table->string('moonsign')->nullable();
            $table->string('dosham')->nullable();
            $table->string('dosatype')->nullable();
            $table->string('star')->nullable();
            $table->string('pob')->nullable();
            $table->string('address')->nullable();
            $table->string('aboutyourself')->nullable();
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('profile_pic')->default('default.jpg')->length(200);
            $table->boolean('email_verified')->default(true);
            $table->boolean('mobile_verified')->default(false);
            $table->string('role')->default('user');
            $table->boolean('active')->default(true);
            $table->boolean('payment_completed')->default(0);
            $table->timestamp('payment_date')->nullable();
            $table->boolean('profile_completed')->default(0);
            $table->boolean('admin_id')->default(0);
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
