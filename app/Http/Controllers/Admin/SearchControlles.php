<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchControlles extends Controller
{
    public function search(Request $request){
//        dump($request->all());

        return view('admin.search');
    }
}
