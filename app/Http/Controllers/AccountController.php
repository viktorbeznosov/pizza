<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    
    public function update(Request $request){
        if ($request->get('password') && $request->get('confirm_pass')){
            $input = $request->except('_token');   
        } else {
            $input = $request->except('_token','password','confirm_pass');              
        }

        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным',
            'same' => 'Введенные пароли должны совпадать'
        );
        $validator = Validator::make($input, array(
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
            'phone' => 'required',
            'confirm_pass' => 'same:password'
        ),$messages);
        if($validator->fails()){
            dd($validator->errors());
            return redirect()->route('account')->withErrors($validator)->withInput();
        }
            
        dd($input);
    }
}
