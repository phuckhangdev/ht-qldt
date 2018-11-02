<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoatdongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoatdongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenhoatdong', 100)->unique();
            $table->string('namhoc',11);
            $table->integer('hocky');
            $table->string('diadiem');
            $table->string('ghichu')->nullable();

            $table->integer('captochuc_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('captochuc_id')->references('id')->on('captochucs');

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
        Schema::dropIfExists('hoatdongs');
    }
}
