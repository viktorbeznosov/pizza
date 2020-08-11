<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    public function show(){
        $services = Service::all();        
        $data = array(
            'title' => 'Services',
            'services' => $services
        );

        return view('services', $data);
    }
}
