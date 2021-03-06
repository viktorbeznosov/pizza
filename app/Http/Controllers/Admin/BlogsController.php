<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Comment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GateHelper;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!GateHelper::all('VIEW_BLOGS')){
            return redirect()->route('admin.404');
        }
        $blogs = Blog::all();
        $data = array(
            'title' => 'Блоги',
            'blogs' => $blogs
        );
        return view('admin.blogs', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        if (!GateHelper::all('CREATE_BLOGS')){
            return redirect()->route('admin.404');
        }
        $title = 'Создание блога';
        $data = array(
            'title' => $title,
        );

        return view('admin.blog', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!GateHelper::all('CREATE_BLOGS')){
            return redirect()->route('admin.404');
        }
        $input = $request->except('_token');
        $input['admin_id'] = Auth::guard('admin')->user()->id;

        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным'
        );
        $validator = Validator::make($input, array(
            'title' => 'required|max:255',
            'text' => 'required',
            'body' => 'required'
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.blogs.create')->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = 'assets/images/blogs/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/assets/images/blogs/', $input['image']);
        }
        $blog = new Blog();
        $blog->fill($input);
        if ($blog->save()){
            return redirect()->route('admin.blogs.index')->with('status','Блог сознан');
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
        $comments = Comment::where('blog_id', $id)->where('parent',0)->get();
        $blog = Blog::find($id);
        
        //Проверка на доступ к блогам
        if (!GateHelper::all('VIEW_BLOGS','VIEW_COMMENTS', ['blog' => $blog])){
            return redirect()->route('admin.404');
        }
            

        $data = array(
            'title' => $blog->title,
            'blog' => $blog,
            'comments' => $comments
        );

        return view('admin.comments', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        //Проверка на доступ к блогам

        if (!GateHelper::all('UPDATE_BLOGS', ['blog' => $blog])){
            return redirect()->route('admin.404');
        }

        $title = $blog->title;
        $data = array(
            'title' => $title,
            'blog' => $blog
        );

        return view('admin.blog', $data);
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
        if (!GateHelper::all('UPDATE_BLOGS')){
            return redirect()->route('admin.404');
        }
        $input = $request->except('_token','_method');
        $blog = Blog::find($id);
        if (isset($blog)){
            $messages = array(
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'
            );

            $validator = Validator::make($input, array(
                'title' => 'required|max:255',
                'text' => 'required',
                'body' => 'required'
            ),$messages);

            if($validator->fails()){
                return redirect()->route('admin.blogs.edit',$id)->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $input['image'] = 'assets/images/blogs/' . time() . '_' . $file->getClientOriginalName();
                $file->move(public_path() . '/assets/images/blogs/', $input['image']);
            }
            $blog->fill($input);
            if ($blog->save()){
                return redirect()->route('admin.blogs.edit', $id)->with('status','Блог сохранен');
            }
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
        if (!GateHelper::all('DELETE_BLOGS')){
            return redirect()->route('admin.404');
        }
        $blog = Blog::find($id);
        if (file_exists(public_path($blog->image)) && $blog->image != ''){
            unlink(public_path($blog->image));
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('status','Блог удален');
    }
}
