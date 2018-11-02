<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXeploaidvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xeploaidvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namhoc',11);
            $table->integer('hocky');
            $table->string('nhanxet',100)->nullable();
            $table->string('xeploai',45);
            $table->boolean('uutu')->default(false);

            $table->integer('user_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xeploaidvs');
    }
}
