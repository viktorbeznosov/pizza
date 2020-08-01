<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function show(){
//        dd( Auth::guard('admin')->user());
        return view('admin.dashboard');
    }
}
