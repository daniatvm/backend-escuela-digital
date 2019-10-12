<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->unsignedBigInteger('id_employee');
            $table->foreign('id_employee')->references('id_employee')->on('employee');
            $table->unsignedBigInteger('id_access_type');
            $table->foreign('id_access_type')->references('id_access_type')->on('access_type');
            $table->string('username',50)->unique();
            $table->string('password',200);
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
        Schema::dropIfExists('user');
    }
}
