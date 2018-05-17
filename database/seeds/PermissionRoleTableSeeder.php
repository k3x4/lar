<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name','=','admin')->get()->first();
        
        $userRead = Permission::where('name','=','user-read')->get()->first();
        $userCreate = Permission::where('name','=','user-create')->get()->first();
        $userEdit = Permission::where('name','=','user-edit')->get()->first();
        $userDelete = Permission::where('name','=','user-delete')->get()->first();
        
        $roleRead = Permission::where('name','=','role-read')->get()->first();
        $roleCreate = Permission::where('name','=','role-create')->get()->first();
        $roleEdit = Permission::where('name','=','role-edit')->get()->first();
        $roleDelete = Permission::where('name','=','role-delete')->get()->first();

        $mediaRead = Permission::where('name','=','media-read')->get()->first();
        $mediaCreate = Permission::where('name','=','media-create')->get()->first();
        $mediaEdit = Permission::where('name','=','media-edit')->get()->first();
        $mediaDelete = Permission::where('name','=','media-delete')->get()->first();
        
        $listingRead = Permission::where('name','=','listing-read')->get()->first();
        $listingCreate = Permission::where('name','=','listing-create')->get()->first();
        $listingEdit = Permission::where('name','=','listing-edit')->get()->first();
        $listingDelete = Permission::where('name','=','listing-delete')->get()->first();

        $admin->attachPermission($userRead);
        $admin->attachPermission($userCreate);
        $admin->attachPermission($userEdit);
        $admin->attachPermission($userDelete);
        
        $admin->attachPermission($roleRead);
        $admin->attachPermission($roleCreate);
        $admin->attachPermission($roleEdit);
        $admin->attachPermission($roleDelete);

        $admin->attachPermission($mediaRead);
        $admin->attachPermission($mediaCreate);
        $admin->attachPermission($mediaEdit);
        $admin->attachPermission($mediaDelete);
        
        $admin->attachPermission($listingRead);
        $admin->attachPermission($listingCreate);
        $admin->attachPermission($listingEdit);
        $admin->attachPermission($listingDelete);
        
    }
}
