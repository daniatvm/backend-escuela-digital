<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassXEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_x_employee', function (Blueprint $table) {
            $table->bigIncrements('id_class_x_user');
            $table->unsignedBigInteger('id_class');
            $table->foreign('id_class')->references('id_class')->on('class');
            $table->unsignedBigInteger('id_employee');
            $table->foreign('id_employee')->references('id_employee')->on('employee');
            $table->boolean('type');
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
        Schema::dropIfExists('class_x_employee');
    }
}
