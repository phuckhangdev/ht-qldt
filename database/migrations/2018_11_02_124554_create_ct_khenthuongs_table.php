<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtKhenthuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_khenthuongs', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('khenthuong_id')->unsigned();
            $table->string('namhoc',11);
            $table->integer('hocky');
            $table->string('thanhtich');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('khenthuong_id')->references('id')->on('khenthuongs')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','khenthuong_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_khenthuongs');
    }
}
