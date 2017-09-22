<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Fluent;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type_id')->nullable();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('street_1')->nullable();
            $table->string('street_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();;
            $table->timestamps();
            $table->integer('created_user_id')->nullable();
            $table->tinyInteger('deleted')->nullable();
            $table->string('role')->nullable();
            $table->rememberToken();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
