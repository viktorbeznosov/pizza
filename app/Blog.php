<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Blog extends Model
{
    protected $fillable = array(
        'admin_id','title','text', 'body', 'image'
    );
    
    public function comments_count(){
        $comments = Comment::where('blog_id', $this->id)->get();
        
        return count($comments);
    }

    public function admin(){
        return $this->hasOne('App\Admin', 'id','admin_id');
    }
}
