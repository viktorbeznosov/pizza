<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function admins(){
        return $this->belongsToMany('App\Admin','role_admin');
    }

    public function permissions(){
        return $this->belongsToMany('App\Permission', 'permission_role');
    }
}
