<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show(){
        
        $user = Auth::user();
        $data = array(
            'title' => 'Личный кабинет',
            'user' => $user
        );  
        return view('account', $data);
    }
}
