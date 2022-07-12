<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->truncate();
        $permissions = DB::table('permissions')->get();

        if ($permissions) {
            foreach ($permissions as $permission) {
                DB::table('permissions')->delete($permission->id);
            }
        }

        $arrayPermission = [
            [
                'name' => 'Permission View',
                'permission' => 'permission_index'
            ],
            [
                'name' => 'Permission Create',
                'permission' => 'permission_create'
            ],
            [
                'name' => 'Permission Edit',
                'permission' => 'permission_edit'
            ],
            [
                'name' => 'Permission Delete',
                'permission' => 'permission_delete'
            ],
            [
                'name' => 'Role View',
                'permission' => 'role_index'
            ],
            [
                'name' => 'Role Create',
                'permission' => 'role_create'
            ],
            [
                'name' => 'Role Edit',
                'permission' => 'role_edit'
            ],
            [
                'name' => 'Role Delete',
                'permission' => 'role_delete'
            ],
            [
                'name' => 'User View',
                'permission' => 'user_index'
            ],
            [
                'name' => 'User Create',
                'permission' => 'user_create'
            ],
            [
                'name' => 'User Edit',
                'permission' => 'user_edit'
            ],
            [
                'name' => 'User Delete',
                'permission' => 'user_delete'
            ],
        ];

        foreach ($arrayPermission as $permission) {
            $data = [
                'name' => $permission['name'],
                'permission' => $permission['permission']
            ];

            \App\Models\Permission::create($data);
        }
    }
}
