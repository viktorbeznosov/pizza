<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Добавление продукта',
        );
        
        return view('admin.product', $data);
    }
    
    public function productCatCreate($catId){
        $data = array(
            'title' => 'Добавление продукта',
            'catId' => $catId
        );
        
        return view('admin.product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным',
            'numeric' => 'Поле :attribute должно быть числом'
        );
        $validator = Validator::make($input, array(
            'name' => 'required|max:255',
            'price' => 'required|numeric'
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.products.product_cat_create', $input['cat_id'])->withErrors($validator)->withInput();
        }
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = 'assets/images/products/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/assets/images/products/', $input['image']);
        }
        $product = new Product();
        $product->fill($input);
        if ($product->save()){
            return redirect()->route('admin.cat.show', $product->cat_id)->with('status','Продукт добавлен');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $data = array(
            'title' => $product->name,
            'product' => $product
        );
        
        return view('admin.product', $data);
    }
    
    public function productCatEdit($id, $catId){
        $product = Product::find($id);
        $category = \App\Category::find($catId);
        $data = array(
            'title' => $product->name,
            'product' => $product,
            'category' => $category
        );
        
        return view('admin.product', $data);        
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
        $input = $request->except('_token','_method');
        $product = Product::find($id);
        if (isset($product)){
            $messages = array(
               'required' => 'Поле :attribute обязательно к заполнению',
               'unique' => 'Поле :attribute должно быть уникальным',
               'numeric' => 'Поле :attribute должно быть числом'
            );
            $validator = Validator::make($input, array(
                'name' => 'required|max:255',
                'price' => 'required|numeric'
            ),$messages);
            if($validator->fails()){
                return redirect()->route('admin.products.create')->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $input['image'] = 'assets/images/products/' . time() . '_' . $file->getClientOriginalName();
                if (isset($category->image) && is_file(public_path() . '/' . $product->image)){
                    unlink(public_path() . '/' . $product->image);
                }                
                $file->move(public_path() . '/assets/images/products/', $input['image']);
            }
            $product->fill($input);
            if ($product->save()){
                return redirect()->route('admin.products.product_cat_edit', array('id' => $product->id, 'catId' => $input['cat_id']))->with('status','Продукт добавлен');
            }
            
        } else {
            // Abort 404
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
        $product = Product::find($id);
        $cat_id = $product->cat_id;
        if (file_exists(public_path($product->image)) && $product->image != ''){
            unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('admin.cat.show', $cat_id)->with('status','Продукт удален');
    }
}
