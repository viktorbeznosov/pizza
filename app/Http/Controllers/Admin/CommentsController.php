<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentsController extends Controller
{
    public function index($blog_id = false){
        $comments = ($blog_id) ? Comment::where('blog_id', $blog_id)->where('parent',0)->get() : Comment::where('parent',0)->get();
        $data = array(
            'comments' => $comments
        );

        return view('admin.comments', $data);
    }

    public function edit($id){
        $comment = Comment::find($id);
        $data = array(
            'title' => isset($comment->user) ? $comment->user->name : $comment->name,
            'comment' => $comment
        );

        return view('admin.comment', $data);
    }

    public function update(Request $request){
        dd($request->all());
    }

    public function destroy($id){
        dd($id);
    }
}
