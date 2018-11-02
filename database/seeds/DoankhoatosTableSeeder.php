<?php

use Illuminate\Database\Seeder;
use App\Doankhoato;

class DoankhoatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $KhoaCNTT = new Doankhoato();
        $KhoaCNTT->tendoankhoato = 'Khoa Công Nghệ Thông Tin';
        $KhoaCNTT->save();
    }
}
