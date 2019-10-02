<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new', function (Blueprint $table) {
            $table->bigIncrements('id_new');
            $table->unsignedBigInteger('id_new_type');
            $table->foreign('id_new_type')->references('id_new_type')->on('new_type');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->unsignedBigInteger('id_class')->nullable();
            $table->foreign('id_class')->references('id_class')->on('class');
            $table->string('title',50);
            $table->string('description',200);
            $table->date('date');
            $table->string('image',150);
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
        Schema::dropIfExists('new');
    }
}
