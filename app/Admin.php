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

    protected function rolesNamesArr(){
        $rolesArr = array();
        foreach ($this->roles()->get() as $role){
            $rolesArr[] = $role->name;
        }

        return $rolesArr;
    }
    
    public function rolesNames(){
        $rolesArr = $this->rolesNamesArr();
        
        if (count($rolesArr) == 0){
            return false;
        }
        return implode(',',$rolesArr);
    }

    public function hasRoles(...$roles){
        $roles = is_array($roles[0]) ? $roles[0] : $roles;

        foreach ($roles as $role){
            if(!in_array($role, $this->rolesNamesArr())){
                return false;
            }
        }

        return true;
    }

    public function hasAnyRole(...$roles){
        $roles = is_array($roles[0]) ? $roles[0] : $roles;

        foreach ($roles as $role){
            if(in_array($role, $this->rolesNamesArr())){
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
    
    public static function getAllRooms(){
        $rooms = array();
        $admins = self::all();        
        $adminsIds = array();
        foreach($admins as $admin){
            $adminsIds[] = $admin->id;
        }
        
        for ($i = 0; $i < count($adminsIds); $i++){
            for($j = $i + 1; $j < count($adminsIds); $j++){
                $rooms[] = 'room.'. $adminsIds[$i] . '.' . $adminsIds[$j];
            }
        }
        
        return $rooms;
    }
    
    public function getRooms(){
        $rooms = array();
        foreach(self::getAllRooms() as $room){
            $roomArr = explode('.', $room);
            if (in_array($this->id, $roomArr)){
                $rooms[] = $room;
            }
        }

        return $rooms;
    }
    
    public function getRoom($admin_id){
        if ($admin_id != $this->id){
            foreach ($this->getRooms() as $room){
                $roomArr = explode('.', $room);
                if (in_array($admin_id, $roomArr)){
                    return $room;
                }
            }
        }

        return false;
    }
}
