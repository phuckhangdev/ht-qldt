<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $student_role = Role::where('slug', 'student')->first();

        $xepLoaiChiDoan = new Permission();
        $xepLoaiChiDoan->slug = 'xep-loai-chi-doan';
        $xepLoaiChiDoan->name = 'Xếp loại Chi đoàn';
        $xepLoaiChiDoan->save();
        $xepLoaiChiDoan->roles()->attach($admin_role);
        $xepLoaiChiDoan->roles()->attach($manager_role);


        $dsKhenThuongVaKyluat = new Permission();
        $dsKhenThuongVaKyluat->slug = 'ds-khen-thuong-ky-luat';
        $dsKhenThuongVaKyluat->name = 'Danh sách khen thưởng và kỹ luật';
        $dsKhenThuongVaKyluat->save();
        $dsKhenThuongVaKyluat->roles()->attach($admin_role);
        $dsKhenThuongVaKyluat->roles()->attach($manager_role);

        $dsHoatDong = new Permission();
        $dsHoatDong->slug = 'ds-tham-gia-hoat-dong';
        $dsHoatDong->name = 'Danh sách hoạt động';
        $dsHoatDong->save();
        $dsHoatDong->roles()->attach($admin_role);
        $dsHoatDong->roles()->attach($manager_role);
    }
}
