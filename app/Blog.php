<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = array(
        'admin_id','title','text', 'body', 'image'
    );

    public function admin(){
        return $this->hasOne('App\Admin', 'id','admin_id');
    }
}
