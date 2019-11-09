<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id_feedback');
            $table->bigInteger('id_school');
            $table->foreign('id_school')->references('id_school')->on('school');
            $table->boolean('type');
            $table->string('name',50);
            $table->string('cellphone',10);
            $table->string('email',50);
            $table->string('feedback_text',300);
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
        Schema::dropIfExists('feedback');
    }
}
