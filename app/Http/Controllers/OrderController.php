<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    public function show(){

    }

    public function create(Request $request){
        $cart = json_decode($request->get('cart'));
//        dump($cart->items);die();

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->status_id = 1;
        $order->save();

        foreach ($cart->items as $item){
            $product = Product::find($item->id);
            $order->products()->attach($product, array('quantity' => $item->quantity));
        }

//        return view('public.order_done');
        return redirect()->route('cart')->with('status','Заказ создан');
    }
}
