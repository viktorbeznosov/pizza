<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function show(){

    }

    public function create(Request $request){
        $cart = json_decode($request->get('cart'));
//        dump($cart->items);die();

        $order = new Foo();
        dd($order);
        $order->user_id = $request->user()->id;
        $order->status_id = 1;
        $order->save();

        foreach ($cart->items as $item){
            $good = Good::find($item->id);
            $order->goods()->attach($good, array('quantity' => $item->quantity));
        }

//        return view('public.order_done');
        return redirect()->route('cart')->with('status','Заказ создан');
    }
}
