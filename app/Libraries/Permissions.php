<?php

namespace App\Libraries;

use App\Role;
use App\Permission;

class Permissions
{

    public static function getPerms()
    {
        $permissions = Permission::get();
        $perms = [];

        foreach($permissions as $permission){
            $perm = $permission->display_name;
            $permArray = explode(' ', $perm);
            $permArray = end($permArray);
            $perms[$permArray][] = $permission;
        }

        return $perms;
    }

    public static function convertLines($perms){
        $tableLines = [];
        foreach($perms as $permGroup){
            foreach($permGroup as $perm){
                $name = explode('-', $perm->name);
                $name = end($name);
                $tableLines[$name][] = $perm;
            }
        }

        return $tableLines;
    }

}
