<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\SearchHelper;

class SearchControlles extends Controller
{
    public function search(Request $request){
        $input = $request->all();
        $query = (isset($input['q'])) ? $input['q'] : '';
        $result = (isset($input['q'])) ? SearchHelper::search($query) : false;


//        dd($result);

        return view('admin.search', array('result' => $result));
    }
}
