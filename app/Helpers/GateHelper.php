<?php

namespace App\Helpers;

use App\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

//Небольшая надстройка для работы с Permissions
class GateHelper {
    
    //Если пользователь имеет хотя бы один доступ
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
            //Админ не может удалить и редактировать сам себя. Только через личный кабинет
            if (in_array($permission, array('UPDATE_ADMINS','DELETE_ADMINS'))){
                if (isset($user)) {
                    if (Gate::forUser($admin)->allows($permission, $user = NULL)) {
                        return true;
                    }
                }
            //Дополнгение. Блогер момет работать только со своими блогами
            } else if (in_array($permission, array('VIEW_BLOGS','UPDATE_BLOGS','DELETE_BLOGS','VIEW_COMMENTS'))) {
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

    //Если пользователь имеет все доступы
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
            //Админ не может удалить и редактировать сам себя. Только через личный кабинет
            if (in_array($permission, array('UPDATE_ADMINS','DELETE_ADMINS'))){
                if (isset($user)){
                    if(Gate::forUser($admin)->denies($permission, $user)){
                        return false;
                    }
                } else {
                    if(Gate::forUser($admin)->denies($permission)){
                        return false;
                    }
                }
            //Дополнгение. Блогер момет работать только со своими блогами
            } else if (in_array($permission, array('VIEW_BLOGS','UPDATE_BLOGS','DELETE_BLOGS','VIEW_COMMENTS'))) {
                if (isset($blog)){
                    if(Gate::forUser($admin)->denies($permission, $blog)){
                        return false;
                    }
                } else {
                    if(Gate::forUser($admin)->denies($permission)){
                        return false;
                    }
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
