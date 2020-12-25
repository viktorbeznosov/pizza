<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Order;
use App\User;
use App\Admin;
use App\Blog;

class IndexController extends Controller
{
    public function __construct()
    {
//        $this->middleware('isAdmin');
    }

    public function show(){
        $orders = Order::all();
        $new_orders = Order::where('status_id', 1)->get();
        //Подсчитать прирост в процентах
        $users = User::all();
        $admins = Admin::all();
        $blogs = Blog::all();
        
        $data = array(
            'orders' => $orders,
            'total_profit' => Order::getTotalProfit(),
            'new_orders_count' => count($new_orders),
            'users_count' => count($users),
            'users' => $users,
            'admins' => $admins,
            'blogs' => $blogs
        );
        
        return view('admin.dashboard', $data);
    }

    public function error404(){
        return view('admin.404');
    }
}
