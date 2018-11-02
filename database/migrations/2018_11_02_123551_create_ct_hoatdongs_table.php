<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtHoatdongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_hoatdongs', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('hoatdong_id')->unsigned();
            $table->string('vaitro');
            $table->string('thanhtich')->nullable();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hoatdong_id')->references('id')->on('hoatdongs')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','hoatdong_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_hoatdongs');
    }
}
