<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChidoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chidoans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenchidoan',20)->unique(); //9DTH
            $table->string('tencuthe',100)->nullable();

            $table->integer('doankhoato_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('doankhoato_id')->references('id')->on('doankhoatos');

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
        Schema::dropIfExists('chidoans');
    }
}
