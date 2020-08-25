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
            return redirect()->route('blog', $input['blog_id'])->with('status','Коментарий добавлен');
        }
    }
    
}
