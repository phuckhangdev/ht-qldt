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
        $admin_permission = Permission::where('slug','create-tasks')->first();
        $manager_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Quản lý';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);

        $student_role = new Role();
        $student_role->slug = 'student';
        $student_role->name = 'Người dùng';
        $student_role->save();
    }
}
