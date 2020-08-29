<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role','role_admin');
    }

    public function permissions(){
        $perms = array();
        foreach ($this->roles()->get() as $role){
            foreach ($role->permissions()->get() as $permission){
                $perms[] = $permission;
            }
        }

        return $perms;
    }

    protected function permissionsNames(){
        $perms = array();
        foreach ($this->permissions() as $permission){
            $perms[] = $permission->name;
        }
        return $perms;
    }

    protected function rolesNames(){
        $rolesArr = array();
        foreach ($this->roles()->get() as $role){
            $rolesArr[] = $role->name;
        }

        return $rolesArr;
    }

    public function hasRoles(...$roles){
        $roles = is_array($roles[0]) ? $roles[0] : $roles;

        foreach ($roles as $role){
            if(!in_array($role, $this->rolesNames())){
                return false;
            }
        }

        return true;
    }

    public function hasAnyRole(...$roles){
        $roles = is_array($roles[0]) ? $roles[0] : $roles;

        foreach ($roles as $role){
            if(in_array($role, $this->rolesNames())){
                return true;
            }
        }

        return false;
    }

    public function hasPermissions(...$perms){
        $perms = is_array($perms[0]) ? $perms[0] : $perms;

        foreach ($perms as $perm){
            if(!in_array($perm, $this->permissionsNames())){
                return false;
            }
        }

        return true;
    }

    public function hasAnyPermission(...$perms){
        $perms = is_array($perms[0]) ? $perms[0] : $perms;

        foreach ($perms as $perm){
            if(in_array($perm, $this->permissionsNames())){
                return true;
            }
        }

        return false;
    }
}
