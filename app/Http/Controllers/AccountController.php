<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;

class AccountController extends Controller
{
    public function show(){
        $user = Auth::user();
        if(!$user){
            return view('auth.login');
        }
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
            return redirect()->route('account')->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::user()->id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = 'assets/images/users/' . time() . '_' . $file->getClientOriginalName();
            if (isset($user->image) && is_file(public_path() . '/' . $user->image)){
                unlink(public_path() . '/' . $user->image);
            }
            $file->move(public_path() . '/assets/images/users/', $input['image']);
        }


        if(isset($input['password'])){
            $input['password'] = bcrypt($input['password']);
        }
        $user->fill($input);
        if ($user->save()){
            return redirect()->route('account')->with('status','Данные сохранены');
        }
            
    }
}
