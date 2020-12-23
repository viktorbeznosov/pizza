<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use App\Blog;
use App\Product;
use App\User;
use App\Admin;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $services = Service::all();
        $categories = Category::all();
        $blogs = Blog::orderBy('created_at','desc')->limit(3)->get();
        $products = Product::all();
        $users = User::all();
        $admins = Admin::all();
        $data = array(
            'title' => 'Services',
            'services' => $services,
            'categories' => $categories,
            'products' => $products,
            'blogs' => $blogs,
            'users' => $users,
            'admins' => $admins
        );

        return view('home', $data);
    }
}
