<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtKyluatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_kyluats', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('kyluat_id')->unsigned();
            $table->string('namhoc',11);
            $table->integer('hocky');
            $table->string('muckyluat');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kyluat_id')->references('id')->on('kyluats')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','kyluat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_kyluats');
    }
}
