<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = [
            
            // USER PERMISSIONS
            [
                'name' => 'user-read',
                'display_name' => 'Display Users',
                'description' => 'Display Users'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Edit User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            
            
            // ROLE PERMISSIONS
            [
                'name' => 'role-read',
                'display_name' => 'Display Roles',
                'description' => 'Display Roles'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            

            // MEDIA PERMISSIONS            
            [
                'name' => 'media-read',
                'display_name' => 'Display Medias',
                'description' => 'Display Medias'
            ],
            [
                'name' => 'media-create',
                'display_name' => 'Create Media',
                'description' => 'Create New Media'
            ],
            [
                'name' => 'media-edit',
                'display_name' => 'Edit Media',
                'description' => 'Edit Media'
            ],
            [
                'name' => 'media-delete',
                'display_name' => 'Delete Media',
                'description' => 'Delete Media'
            ],


            // MEDIA SIZES PERMISSIONS            
            [
                'name' => 'mediasize-read',
                'display_name' => 'Display Media sizes',
                'description' => 'Display Media sizes'
            ],
            [
                'name' => 'mediasize-create',
                'display_name' => 'Create Media size',
                'description' => 'Create New Media size'
            ],
            [
                'name' => 'mediasize-edit',
                'display_name' => 'Edit Media size',
                'description' => 'Edit Media size'
            ],
            [
                'name' => 'mediasize-delete',
                'display_name' => 'Delete Media size',
                'description' => 'Delete Media size'
            ],


            // CATEGORY PERMISSIONS            
            [
                'name' => 'category-read',
                'display_name' => 'Display Category',
                'description' => 'Display Category'
            ],
            [
                'name' => 'category-create',
                'display_name' => 'Create Category',
                'description' => 'Create New Category'
            ],
            [
                'name' => 'category-edit',
                'display_name' => 'Edit Category',
                'description' => 'Edit Category'
            ],
            [
                'name' => 'category-delete',
                'display_name' => 'Delete Category',
                'description' => 'Delete Category'
            ],
            

            // LISTING PERMISSIONS            
            [
                'name' => 'listing-read',
                'display_name' => 'Display Listings',
                'description' => 'Display Listings'
            ],
            [
                'name' => 'listing-create',
                'display_name' => 'Create Listing',
                'description' => 'Create New Listing'
            ],
            [
                'name' => 'listing-edit',
                'display_name' => 'Edit Listing',
                'description' => 'Edit Listing'
            ],
            [
                'name' => 'listing-delete',
                'display_name' => 'Delete Listing',
                'description' => 'Delete Listing'
            ],
            
            
        
            
        ];
        
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        
    }

}
