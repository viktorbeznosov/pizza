<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Category;
use App\OrderStatus;

use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $data = array(
            'title' => 'Заказы',
            'orders' => $orders
        );
        return view('admin.orders', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $products = $order->products()->get();
        $categories = Category::all();
        $statuses = OrderStatus::all();

        $title = 'Заказ № ' . $order->id;

        $data = array(
            'title' => $title,
            'order' => $order,
            'products' => $products,
            'categories' => $categories,
            'statuses' => $statuses
        );

        return view('admin.order', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $productIds = $request->get('productId');
        $productQtys = $request->get('productQty');

        $products = array();
        for ($i = 0; $i < count($productIds); $i++){
            $products[] = array(
                'good_id' => $productIds[$i],
                'quantity' => $productQtys[$i]
            );
        }
        $order->products()->sync($products);
        $order->status_id = $request->get('status_id');

        if ($order->save()){
            return redirect()->route('admin.orders.edit', $order->id)->with('status','Заказ изменен');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        DB::delete('DELETE FROM order_good WHERE order_id = ?', [$order->id]);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('status','Заказ удален');
    }
}
