<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id = false){
        if ($id){
            return view('blog-single');
        } else {
            return view('blog');
        }

    }
}
