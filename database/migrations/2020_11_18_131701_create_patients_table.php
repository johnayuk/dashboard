<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('condition');
            $table->string('previous_med_record');
            $table->string('family_med_record');
            $table->string('overall_physical_status');
            $table->string('next_of_kin');
            $table->string('x_ray');
            $table->string('address');
            $table->unsignedBigInteger('doctor_id');
            $table->string('ward');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}