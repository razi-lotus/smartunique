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
            $table->increments('id');
            $table->string('uuid')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('father_name')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('gender')->nullable();
            $table->mediumInteger('country_id')->unsigned();
            $table->mediumInteger('city_id')->unsigned();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('street_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cnic')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('pet_name')->nullable();
            $table->string('status')->nullable()->comment('active,pending,blocked');
            $table->string('level')->nullable()->comment('1,2,3,4');
            // $table->rememberToken();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
