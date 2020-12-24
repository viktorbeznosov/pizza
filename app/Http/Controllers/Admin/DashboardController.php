<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function getUsers(Request $request){
        
        $intervals = array();
        
        for($i = 0; $i < 12; $i++){
            $dateYearAgoMin = new \DateTime;
            $dateYearAgoMax = new \DateTime;
            $dateYearAgoMin->modify('-1 year');
            $dateYearAgoMax->modify('-1 year');
            
            $dateYearAgoMin->modify('+ ' . ($i) . ' month');
            $dateYearAgoMax->modify('+ ' . ($i+1) . ' month');
       
            $users = User::wherebetween('created_at', [$dateYearAgoMin,$dateYearAgoMax])->get();
            
            $intervals[] = array(
                $dateYearAgoMax->format('m') . '.' . $dateYearAgoMax->format('Y'),
                count($users)
            );
            
        }
        
        print_r(
            json_encode($intervals, JSON_UNESCAPED_UNICODE)
        );
    }
}
