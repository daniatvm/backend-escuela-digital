<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id_employee');
            $table->unsignedBigInteger('id_job');
            $table->foreign('id_job')->references('id_job')->on('job');
            $table->unsignedBigInteger('id_school');
            $table->foreign('id_school')->references('id_school')->on('school');
            $table->string('name',10);
            $table->string('last_name',10);
            $table->string('second_last_name',10);
            $table->string('email',50)->unique();
            $table->string('cellphone',10);
            $table->string('image',150);
            $table->string('id_card',10)->unique();
            $table->boolean('status');
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
        Schema::dropIfExists('employee');
    }
}
