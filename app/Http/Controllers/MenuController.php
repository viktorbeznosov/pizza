<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function show($id = false){
        if ($id){
            $product = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->select('products.*','categories.name as category')
                ->where('products.id','=',$id)
                ->get();
            if (count($product) > 0){
                $product = $product[0];
                $data = array(
                    'title' => $product->name,
                    'product' => $product
                );
                dump($product->id);
                return view('product', $data);
            }
        } else {
            $categories = Category::all();
            $hot = Product::where('hot', 1)->get();

            $pizza = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cat_id')
                    ->select('products.*','categories.name as category')
                    ->where('categories.name','=','Pizza')
                    ->get();

            $data = array(
                'title' => 'Menu',
                'categories' => $categories,
                'hot' => $hot,
                'pizza' => $pizza
            );

            return view('menu', $data);
        }

    }
    
    public function product($id){
        dump($id);
    }
}
