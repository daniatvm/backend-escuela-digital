<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->bigIncrements('id_school');
            $table->string("name",50);
            $table->string("description",200);
            $table->string("address",100);
            $table->string("image",150);
            $table->string("email",50);
            $table->string("cellphone",10);
            $table->string("telephone",10);
            $table->float("lat",10,10);
            $table->float("lng",10,10);
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
        Schema::dropIfExists('school');
    }
}
