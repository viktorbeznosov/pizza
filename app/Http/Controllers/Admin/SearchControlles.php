<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\SearchHelper;

class SearchControlles extends Controller
{
    public function search(Request $request){
        $input = $request->all();
        $query = $input['q'];
        dd(SearchHelper::search($query));

        return view('admin.search');
    }
}
