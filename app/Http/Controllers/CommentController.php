<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentController extends Controller
{
    //

    public function addComment(Request $request)
    {
        // dd($request);
        $userID = Auth::guard('user')->user()->id;


        $comment = Comment::create([
            'user_id' => $userID,
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);

        if($comment)
            return back()->with('success','Binh luan thanh cong');
        else
            return back()->with('error','Co loi xay ra');
    }

    public function deleteComment(Comment $comment)
    {
        // dd($comment);
        // dd($id);
        if($id == null)
        {
            return view('error.pageerror');
        }
        // Check server
        // $comment = Comment::find($id);
        $comment->delete();

        return back()->with('success','Xoá bình luận thành công');
    }
}
