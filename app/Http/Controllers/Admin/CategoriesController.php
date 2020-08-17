<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = array(
            'title' => 'Категории',
            'categories' => $categories
        );


        return view('admin.categories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Добавление категории',
        );

        return view('admin.category', $data);
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
            'unique' => 'Поле :attribute должно быть уникальным'
        );
        $validator = Validator::make($input, array(
            'name' => 'required|max:255',
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.cat.create')->withErrors($validator)->withInput();
        }
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = 'assets/images/categories/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/assets/images/categories/', $input['image']);
        }
        $category = new Category();
        $category->fill($input);
        if ($category->save()){
            return redirect()->route('admin.cat.index')->with('status','Категория добавлена');
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
        $category = Category::find($id);
        $products = Product::where('cat_id', $id)->get();

        $data = array(
            'title' => $category->name,
            'category' => $category,
            'products' => $products
        );

        return view('admin.products', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        $data = array(
            'title' => $category->name,
            'category' => $category
        );

        return view('admin.category', $data);
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
        $category = Category::find($id);
        if (isset($category)){
            $messages = array(
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'
            );
            $validator = Validator::make($input, array(
                'name' => 'required|max:255',
            ),$messages);
            if($validator->fails()){
                return redirect()->route('admin.cat.create')->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $input['image'] = 'assets/images/categories/' . time() . '_' . $file->getClientOriginalName();
                if (isset($category->image) && is_file(public_path() . '/' . $category->image)){
                    unlink(public_path() . '/' . $category->image);
                }                
                $file->move(public_path() . '/assets/images/categories/', $input['image']);
            }
            $category->fill($input);
            if ($category->save()){
                return redirect()->route('admin.cat.edit', $category->id)->with('status','Категория сохранена');
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
        dd($id);
    }
}
