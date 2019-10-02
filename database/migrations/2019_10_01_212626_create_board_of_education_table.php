<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardOfEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_of_education', function (Blueprint $table) {
            $table->bigIncrements('id_board_education');
            $table->unsignedBigInteger("id_school");
            $table->foreign("id_school")->references("id_school")->on("school");
            $table->string("description",200);
            $table->string("email",50);
            $table->string("telephone",10);
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
        Schema::dropIfExists('board_of_education');
    }
}
