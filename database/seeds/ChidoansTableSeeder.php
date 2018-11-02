<?php

use Illuminate\Database\Seeder;
use App\Doankhoato;
use App\Chidoan;

class ChidoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $KhoaCNTT = Doankhoato::where('tendoankhoato','Khoa Công Nghệ Thông Tin')->first();

        $ChiDoan_9DTH = new Chidoan();
        $ChiDoan_9DTH->tenchidoan = '9DTH';
        $ChiDoan_9DTH->tencuthe = 'Đại học CNTT khóa 9';
        $ChiDoan_9DTH->doankhoato_id = $KhoaCNTT->id;
        $ChiDoan_9DTH->save();
    }
}
