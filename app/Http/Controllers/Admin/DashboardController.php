<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getUsers(Request $request){
        print_r(
            json_encode(array(
                ['01.2020', 5],
                ['02.2020', 10],
                ['03.2020', 20],
                ['04.2020', 25],
                ['05.2020', 30],
                ['06.2020', 20],
                ['07.2020', 25],
                ['08.2020', 50],
                ['09.2020', 30],
                ['10.2020', 20],
                ['11.2020', 10],
                ['12.2020', 10],
            ), JSON_UNESCAPED_UNICODE)
        );
    }
}
