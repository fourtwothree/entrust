<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //清空权限相关的数据表
        Permission::truncate();
        Role::truncate();
        User::truncate();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        //创建初始的管理员用户 if necessary
        $aquila = User::create([
            'name' => 'aquila',
            'email' => 'aquila@qq.com',
            'password' => bcrypt('111111')
        ]);

        //创建初始的role(初始的角色设定)
        $admin = Role::create([
            'name'=>'admin',
            'display_name'=>'管理员',
            'description'=>'super admin role'
        ]);

        //创建相应的初始权限
        $permissions = [
            [
                'name'=>'create_user',
                'display_name'=>'创建用户',
            ],
            [
                'name'=>'edit_user',
                'display_name'=>'编辑用户',
            ],
            [
                'name'=>'delete_user',
                'display_name'=>'删除用户',
            ],
//            [
//                'name'=>'edit_role',
//                'display_name'=>'编辑角色',
//            ],
//            [
//                'name'=>'delete_role',
//                'display_name'=>'删除角色',
//            ]
        ];

        foreach($permissions as $permission){
            $manage_user = Permission::create($permission);
            //给角色赋予相应的权限
            $admin->attachPermission($manage_user);
        }

//        $manage_user = Permission::create([
//            'name'=>'manage_user',
//            'display_name'=>'用户管理',
//            'description'=>'管理用户的权限'
//        ]);


        //给用户赋予相应的角色
        $aquila->attachRole($admin);
    }
}
