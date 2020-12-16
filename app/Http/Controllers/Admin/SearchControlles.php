<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use sngrl\SphinxSearch\SphinxSearch;

class SearchControlles extends Controller
{
    public function search($q){  
        dump($q);
        $sphinx  = new SphinxSearch();
        $results = $sphinx->search($q, 'index_name')->get();
        
        dump($sphinx);
    }
}
