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
            // $table->string('first_name');
            // $table->string('last_name');
            // $table->string('image');
            // $table->string('email')->unique();
            // $table->string('password');
            $table->string('specialization');
            $table->unsignedBigInteger('department_id');

            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->OnDelete('cascade');

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
