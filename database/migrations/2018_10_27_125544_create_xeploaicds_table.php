<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXeploaicdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xeploaicds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namhoc',11);
            $table->string('xeploai',45);

            $table->integer('chidoan_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('chidoan_id')->references('id')->on('chidoans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xeploaicds');
    }
}
