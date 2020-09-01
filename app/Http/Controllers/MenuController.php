<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class MenuController extends Controller
{
    public function show(){
        $categories = Category::all();
        $data = array(
            'title' => 'Menu',
            'categories' => $categories
        );
        
        return view('menu', $data);
    }
}
