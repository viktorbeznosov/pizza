<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
    public function __construct()
    {
//        $this->middleware('isAdmin');
    }

    public function show(){
        return view('admin.dashboard');
    }
}
