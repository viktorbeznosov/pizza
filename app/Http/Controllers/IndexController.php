<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $services = Service::all();
        $categories = Category::all();
        $data = array(
            'title' => 'Services',
            'services' => $services,
            'categories' => $categories
        );

        return view('home', $data);
    }
}
