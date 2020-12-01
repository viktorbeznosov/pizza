<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function show($user_id, $order_id = false){
        if ($order_id){
            $orders = Order::where('user_id', Auth::user()->id)->where('id', $order_id)->get();
            if (count($orders) > 0){
                $title = 'Заказ №' . $orders[0]->id;

                $data = array(
                    'title' => $title,
                    'order' => $orders[0]
                );

                return view('order', $data);
            } else {
                abort(404);
            }


        } else {
            $orders = Order::where('user_id', Auth::user()->id)->get();
            $title = 'Заказы';

            $data = array(
                'title' => $title,
                'orders' => $orders
            );

            return view('orders', $data);
        }
    }

    public function create(Request $request){
        $cart = json_decode($request->get('cart'));
        if (!Auth::user()){
//             dump($request->all());die();
            $input = $request->all();
            $messages = array(
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'same' => 'Введенные пароли должны совпадать'
            );
            $validator = Validator::make($input, array(
                'name' => 'required|max:255',
                'email' => 'required|unique:users',
                'phone' => 'required',
                'confirm_pass' => 'same:password'
            ),$messages);
            if($validator->fails()){
                return redirect()->route('cart')->withErrors($validator)->withInput();
            }

            $user = new User();
            $input['password'] = bcrypt($request->get('password'));
            $input['confirm_pass'] = bcrypt($request->get('confirm_pass'));
            $user->fill($input);

            if ($user->save()){
                Auth::login($user, true);
            }
        }



        $order = new Order();
        $order->user_id = isset($request->user()->id) ? $request->user()->id : $user->id;
        $order->status_id = 1;
        $order->save();

        foreach ($cart->items as $item){
            $product = Product::find($item->id);
            $order->products()->attach($product, array('quantity' => $item->quantity));
        }

        print_r(json_encode(array(
            'order_id' => $order->id,
            'mail' => Auth::user()->mail,
            'user_id' => Auth::user()->id,
        )));
        die();

//        return view('public.order_done');
//        return redirect()->route('cart')->with('status','Заказ создан');
    }

    public function checkUser(Request $request){

        print_r(json_encode($request->all()));

    }

}
