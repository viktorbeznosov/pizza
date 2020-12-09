<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterAjaxController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();
        $messages = array(
            'name.required' => 'Поле :attribute должно быть заполненно',
            'email.unique' => 'Данный :attribute уже занят',
            'password.confirmed' => 'Пароли не совпадают'
        );
    	$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ], $messages);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => bcrypt($input['password']),
        ]);

        $notification_info = json_encode(
            array(
                'user' => array(
                    'id' => $user->id,
                    'email' => $user->email,
                    'name' => $user->name
                )
            ), JSON_UNESCAPED_UNICODE
        );

        $notification = new Notification();
        $notification->type = 'users';
        $notification->message = 'Зарегистрировался новый пользователь';
        $notification->info = $notification_info;
        $notification->read = 0;
        $notification->save();

        Auth::guard()->login($user);
        
        return response()->json([
            'success'=>'Register new user.',
            'user' => $user,
            'notification' => array(
                'id'   => $notification->id,
                'date' => $notification->created_at->format('d.m.Y G:i')
            )
        ]);
    	
    }
}
