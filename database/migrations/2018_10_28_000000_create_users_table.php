<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            $table->string('username', 15)->unique(); // Mã đoàn viên
            $table->string('password'); // mat khau

            $table->string('tendoanvien', 45); // Tô Phúc Khang
            $table->date('ngaysinh')->nullable(); // 09/12/1997
            $table->boolean('gioitinh')->default(true); // true la nam, false la nu
            $table->string('quequan', 100)->nullable(); // số 56, khóm 1, phường 2, Tp. Bạc Liêu
            $table->string('dantoc', 20);
            $table->date('ngayvaodoan')->nullable(); // 19/05/2015
            $table->string('noivaodoan', 100)->nullable(); // Trường Đại Học Bạc Liêu
            $table->string('chucvu', 10); // Bí thư, Phó Bí thư, Đoàn viên
            $table->boolean('dangvien')->default(false); //true là đảng viên
            $table->string('hinhanh',100); //url ảnh

            $table->integer('chidoan_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('chidoan_id')->references('id')->on('chidoans');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
