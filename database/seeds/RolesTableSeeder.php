<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrator';
        $admin->description = 'User has access to all system functionality.';
        $admin->save();

        $user = new Role();
        $user->name = 'user';
        $user->display_name = 'User';
        $user->description = 'Provides solely the ability to log in to the front end interface.';
        $user->save();
        
        $editor = new Role();
        $editor->name = 'editor';
        $editor->display_name = 'Editor';
        $editor->description = 'Control over all content on the site, but restricts the access to website settings.';
        $editor->save();
        
        $author = new Role();
        $author->name = 'author';
        $author->display_name = 'Author';
        $author->description = 'Manage only the content they have created.';
        $author->save();        
        
    }

}
