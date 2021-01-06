<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleEditor= Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);
        // Permission List 
        $permissions = [
                [
                    'group_name' => 'dashboard',
                    'permissions' => [
                        'dashboard.view',
                    ]
                ],
                [
                    'group_name' => 'blog',
                    'permissions' => [
                        'blog.create',
                        'blog.view',
                        'blog.edit',
                        'blog.delete',
                    ]
                ],
                [
                    'group_name' => 'admin',
                    'permissions' => [
                        'admin.create',
                        'admin.view',
                        'admin.edit',
                        'admin.delete',
                    ]
                ],
                [
                    'group_name' => 'role',
                    'permissions' => [
                        'role.create',
                        'role.view',
                        'role.edit',
                        'role.delete',
                    ]
                ],
                [
                    'group_name' => 'profile',
                    'permissions' => [
                        'profile.edit',
                        'profile.view',
                    ]
                ],

            ];
        // Create and Assign Permission 
        for ($i=0; $i < count((array)$permissions); $i++) { 
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0; $j < count((array)$permissions[$i]['permissions']); $j++) { 
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j],'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }

        }
    }
}
