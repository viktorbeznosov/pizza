<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function show($id = false){
        if ($id){
            $blog = Blog::find($id);
            $data = array(
                'title' => $blog->title,
                'blog' => $blog
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
