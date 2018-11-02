<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permission = Permission::where('slug','xep-loai-chi-doan')->first();
        $admin_permission1 = Permission::where('slug','ds-khen-thuong-ky-luat')->first();
        $admin_permission2 = Permission::where('slug','ds-tham-gia-hoat-dong')->first();

        $manager_permission = Permission::where('slug','xep-loai-chi-doan')->first();
        $manager_permission1 = Permission::where('slug','ds-khen-thuong-ky-luat')->first();
        $manager_permission2 = Permission::where('slug','ds-tham-gia-hoat-dong')->first();

        //RoleTableSeeder.php
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);
        $admin_role->permissions()->attach($admin_permission1);
        $admin_role->permissions()->attach($admin_permission2);

        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Quản lý';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);
        $manager_role->permissions()->attach($manager_permission1);
        $manager_role->permissions()->attach($manager_permission2);

        $student_role = new Role();
        $student_role->slug = 'student';
        $student_role->name = 'Người dùng';
        $student_role->save();
    }
}
