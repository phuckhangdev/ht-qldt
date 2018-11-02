<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;
use App\Permission;
use App\User;
use App\Chidoan;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = factory(App\User::class)->create([
        //     'username' => '15D480201020',
        //     'password' => bcrypt('doanvien'),
        //     'tendoanvien' => 'Tô Phúc Khang',
        //     'ngaysinh' => Carbon::createFromFormat('d/m/Y','09/12/1997'),
        //     'gioitinh' => true,
        //     'quequan' => 'số 56, khóm 1, phường 2, Tp. Bạc Liêu',
        //     'ngayvaodoan' => Carbon::createFromFormat('d/m/Y','19/05/2015'),
        //     'noivaodoan' => 'Trường Đại Học Bạc Liêu',
        //     'chucvu' => 'Đoàn viên',
        //     'dangvien' => false,
        //     'hinhanh' => 'profile.png'
        // ]);


        $admin_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $student_role = Role::where('slug', 'student')->first();
        $admin_perm = Permission::where('slug','quan-ly-chi-doan')->first();
        $manager_perm = Permission::where('slug','edit-users')->first();

        $ChiDoan_9DTH = Chidoan::where('tenchidoan','9DTH')->first();

        $admin = new User();
        $admin->username = '15D480201020';
        $admin->password = bcrypt('doanvien');
        $admin->tendoanvien = 'Tô Phúc Khang';
        $admin->ngaysinh = Carbon::createFromFormat('d/m/Y','09/12/1997');
        $admin->gioitinh = true;
        $admin->quequan = 'số 56, khóm 1, phường 2, Tp. Bạc Liêu';
        $admin->dantoc = 'Hoa';
        $admin->ngayvaodoan = Carbon::createFromFormat('d/m/Y','19/05/2015');
        $admin->noivaodoan = 'Trường Đại Học Bạc Liêu';
        $admin->chucvu = 'Đoàn viên';
        $admin->dangvien = false;
        $admin->hinhanh = 'profile.png';
        $admin->chidoan_id = $ChiDoan_9DTH->id;
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);
        
        $manager = new User();
        $manager->username = '15D480201035';
        $manager->password = bcrypt('doanvien');
        $manager->tendoanvien = 'Lê Quan Phú';
        $manager->ngaysinh = Carbon::createFromFormat('d/m/Y','26/09/1996');
        $manager->gioitinh = true;
        $manager->quequan = 'Ấp 16/2, Vĩnh Lợi, Thạnh Trị, Sóc Trăng';
        $manager->dantoc = 'Kinh';
        $manager->ngayvaodoan = Carbon::createFromFormat('d/m/Y','19/05/2012');
        $manager->noivaodoan = 'Trường Đại Học Bạc Liêu';
        $manager->chucvu = 'Phó Bí thư';
        $manager->dangvien = false;
        $manager->hinhanh = 'profile.png';
        $manager->chidoan_id = $ChiDoan_9DTH->id;
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);

        $student = new User();
        $student->username = '15D480201031';
        $student->password = bcrypt('doanvien');
        $student->tendoanvien = 'Lê Vũ Thanh Phong';
        $student->ngaysinh = Carbon::createFromFormat('d/m/Y','17/01/1994');
        $student->gioitinh = true;
        $student->quequan = 'Trà kha A, phường 8, Bạc Liêu';
        $student->dantoc = 'Kinh';
        $student->ngayvaodoan = Carbon::createFromFormat('d/m/Y','26/03/2012');
        $student->noivaodoan = 'Trường Đại Học Bạc Liêu';
        $student->chucvu = 'Đoàn viên';
        $student->dangvien = false;
        $student->hinhanh = 'profile.png';
        $student->chidoan_id = $ChiDoan_9DTH->id;
        $student->save();
        $student->roles()->attach($student);
    }
}