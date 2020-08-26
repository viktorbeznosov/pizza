<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

use Illuminate\Support\Facades\Validator;

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
        $input = $request->except('_token');
        $comment = Comment::find($input['comment_id']);
        
        $messages = array(
            'required' => 'Поле :attribute обязательно к заполнению',
        );
        $validator = Validator::make($input, array(
            'text' => 'required',
        ),$messages);
        if($validator->fails()){
            return redirect()->route('admin.comments.edit', $comment->id)->withErrors($validator)->withInput();
        }
        
        $comment->fill($input);
        if ($comment->save()){
            return redirect()->route('admin.comments.edit', $comment->id)->with('status','Коментарий изменен');
        }
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $blog_id = $comment->blog_id;
        $comment->delete();
        //Удалить все дочерние комменты!
        
        return redirect()->route('admin.comments.index', $blog_id)->with('status','Коментарий удален');
    }
}
