<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    
    public function store(Request $request){
        $input = $request->except('_token');
        if (Auth::user()){
            $input['user_id'] = Auth::user()->id;
        }
                
        $comment = new Comment();
        $comment->fill($input);
        
        if ($comment->save()){
            $auth = Auth::user() ? 1 : 0;
            $image = Auth::user() ? Auth::user()->image : 'assets/images/no-image.png';
            $name = Auth::user() ? Auth::user()->name : $input['name'];
            $response = array(
                'id' => $comment->id,
                'parent' => $comment->parent,
                'text' => $comment->text,
                'created_at' => $comment->created_at->format('d.m.Y H:i'),
                'blog_id' => $comment->blog_id,
                'name' => $name,
                'image' => $image,
                'auth' => $auth,
                'token' => $request->get('_token')
            );
            print_r(json_encode($response, JSON_UNESCAPED_UNICODE));
//            return redirect()->route('blog', $input['blog_id'])->with('status','Коментарий добавлен');
        }
    }
    
}
