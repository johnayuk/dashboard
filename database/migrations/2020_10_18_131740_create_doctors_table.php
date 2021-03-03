<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id');
            $table->string('address');
            $table->string('dateEmployed');
            $table->string('salary');
            $table->string('age');
            $table->string('specialization');
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
