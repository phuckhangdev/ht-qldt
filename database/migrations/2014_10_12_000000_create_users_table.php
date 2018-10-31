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
            $table->date('ngaysinh'); // 09/12/1997
            $table->boolean('gioitinh')->default(true); // true la nam, false la nu
            $table->string('quequan', 100); // số 56, khóm 1, phường 2, Tp. Bạc Liêu
            $table->date('ngayvaodoan'); // 19/05/2015
            $table->string('noivaodoan', 100); // Trường Đại Học Bạc Liêu
            $table->string('chucvu', 10); // Bí thư, Phó Bí thư, Đoàn viên
            $table->boolean('dangvien')->default(false); //true là đảng viên
            $table->string('hinhanh',100); //url ảnh
            
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
