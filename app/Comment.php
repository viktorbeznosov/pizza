<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array('parent', 'blog_id', 'user_id', 'name', 'email', 'text');
    
    public function user(){
        return $this->hasOne('App\User', 'id','user_id');
    }
    
    public function blog(){
        return $this->hasOne('App\Blog', 'id', 'blog_id');
    }

    public function getChildren(){
        $children = Comment::orderBy('created_at', 'desc')->where('parent', $this->id)->get();

        return $children;
    }

    public function hasChildren(){
        $childs = Comment::where('parent', $this->id)->get();

        return (count($childs) > 0);
    }

}
