<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;

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
    
    public function getOrders(){
        
        $intervals = array();
        $months = array(
            "01" => 'ЯНВ',
            "02" => 'ФЕВ',
            "03" => 'МАР',
            "04" => 'АПР',
            "05" => 'МАЙ',
            "06" => 'ИЮН',
            "07" => 'ИЮЛ',
            "08" => 'АВГ',
            "09" => 'СЕН',
            "10" => 'ОКТ',
            "11" => 'НОЯ',
            "12" => 'ДЕК'
        );
        
        for ($i = 0; $i < 12; $i++){
            $dateYearAgoMin = new \DateTime;
            $dateYearAgoMax = new \DateTime;
            $dateYearAgoMin->modify('-1 year');
            $dateYearAgoMax->modify('-1 year');
            
            $dateYearAgoMin->modify('+ ' . ($i) . ' month');
            $dateYearAgoMax->modify('+ ' . ($i+1) . ' month');
            
            $orders = Order::wherebetween('created_at', [$dateYearAgoMin,$dateYearAgoMax])->get();
            $totalOrdersPrice = 0;
            foreach($orders as $order){
                $totalOrdersPrice += $order->getTotalPrice();                
            }
            $intervals[] = array($months[$dateYearAgoMax->format('m')] . " " . $dateYearAgoMax->format('Y'), $totalOrdersPrice);
        } 
        
        print_r(json_encode($intervals, JSON_UNESCAPED_UNICODE));
        
    }
}
