<?php

namespace App\Helpers;

use App\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class GateHelper {
    
    public static function any(...$permissions){
        $permissions = is_array($permissions[0]) ? $permissions[0] : $permissions;
        if (is_array($permissions[count($permissions) - 1])){
            $data = $permissions[count($permissions) - 1];
            $user =  $data['user'];
            $blog = $data['blog'];
            unset($permissions[count($permissions) - 1]);
        }
        $admin = Auth::guard('admin')->user();

        foreach ($permissions as $permission){
            if (in_array($permission, array('UPDATE_ADMINS','DELETE_ADMINS'))){
                if(Gate::forUser($admin)->allows($permission, $user)){
                    return true;
                }
            } else if (in_array($permission, array('VIEW_BLOGS','UPDATE_BLOGS','DELETE_BLOGS'))) {
                if(Gate::forUser($admin)->allows($permission, $blog = NULL)){
                    return true;
                }
            } else {
                if(Gate::forUser($admin)->allows($permission)){
                    return true;
                }
            }
        }

        return false;
    }

    public static function all(...$permissions){
        $permissions = is_array($permissions[0]) ? $permissions[0] : $permissions;
        $blog = NULL;
        if (is_array($permissions[count($permissions) - 1])){
            $data = $permissions[count($permissions) - 1];
            $user =  isset($data['user']) ? $data['user'] : NULL ;
            $blog = isset($data['blog']) ? $data['blog'] : NULL;
            unset($permissions[count($permissions) - 1]);
        }
        $admin = Auth::guard('admin')->user();
        
        foreach ($permissions as $permission){
            if (in_array($permission, array('UPDATE_ADMINS','DELETE_ADMINS'))){
                if(Gate::forUser($admin)->denies($permission, $user)){
                    return false;
                }
            } else if (in_array($permission, array('VIEW_BLOGS','UPDATE_BLOGS','DELETE_BLOGS'))) {
                if(Gate::forUser($admin)->denies($permission, $blog)){
                    return false;
                }
            } else {
                if(Gate::forUser($admin)->denies($permission)){
                    return false;
                }
            }
        }

        return true;
    }


}
