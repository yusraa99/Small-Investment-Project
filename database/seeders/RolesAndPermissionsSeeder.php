<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionNames=[
            'messages create', 'messages view', 'messages edit', 'messages delete',
            'settings create', 'settings view', 'settings edit', 'settings delete',
            'user create', 'user view', 'user edit', 'user delete',
            'projects create', 'projects view', 'projects edit', 'projects delete',
            'reports project', 'reports users', 'reports view','reports delete',
        

        ];

        $permissions=collect($arrayOfPermissionNames)->map(function($permission){
            return [
                'name'=>$permission,
                'guard_name'=> 'web',
            ];

        });

        Permission::insert($permissions->toArray());

        $role=Role::create(['name'=>'superAdmin'])
        ->givePermissionTo($arrayOfPermissionNames);

        $role=Role::create(['name'=>'admin'])
        ->givePermissionTo($arrayOfPermissionNames);
    }
}   
