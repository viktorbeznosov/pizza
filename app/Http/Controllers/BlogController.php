<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function show($id = false){
        if ($id){
            $blog = Blog::find($id);
            $comments = Comment::where("blog_id",$id)->where('parent', 0)->get();

            $data = array(
                'title' => $blog->title,
                'blog' => $blog,
                'comments' => $comments
            );

            return view('blog-single', $data);
        } else {
            $blogs = Blog::paginate(6);
            $data = array(
                'title' => 'READ OUR BLOG',
                'blogs' => $blogs
            );
            return view('blog', $data);
        }

    }
}
