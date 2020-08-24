<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array('parent', 'blog_id', 'user_id', 'name', 'email', 'text');
    
    public function user(){
        return $this->hasOne('App\USer', 'id','user_id');
    }
    
    public function getChilds(){
        $childs = Comment::where('parent', $this->id)->get();
        
        return $childs;
    }
  

}
