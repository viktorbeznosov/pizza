<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use App\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $services = Service::all();
        $categories = Category::all();
        $blogs = Blog::orderBy('created_at','desc')->limit(3)->get();
        $data = array(
            'title' => 'Services',
            'services' => $services,
            'categories' => $categories,
            'blogs' => $blogs
        );

        return view('home', $data);
    }
}
