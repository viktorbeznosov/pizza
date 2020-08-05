<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $services = Service::all();
        $data = array(
            'title' => 'Services',
            'services' => $services
        );

        return view('home', $data);
    }
}
