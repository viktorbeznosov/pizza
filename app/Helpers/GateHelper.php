<?php

namespace App\Helpers;

use App\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class GateHelper {
    
    public static function any(...$permissions){
        $permissions = is_array($permissions[0]) ? $permissions[0] : $permissions;
        $admin = Auth::guard('admin')->user();
        
        foreach ($permissions as $permission){
            if(Gate::forUser($admin)->allows($permission)){
                return true;
            }
        }

        return false;
    }
    
    public static function all(...$permissions){
        $permissions = is_array($permissions[0]) ? $permissions[0] : $permissions;
        $admin = Auth::guard('admin')->user();
        
        foreach ($permissions as $permission){
            if(Gate::forUser($admin)->denies($permission)){
                return false;
            }
        }

        return true;
    }


}
>>>>>>> 2c756bcb9c7501d102a37e8385168e7d6b99d57d
