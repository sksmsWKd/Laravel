<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function commentSave(Request $request, $id)
    {

        $setcontent = $request->content;


        $request->validate([
            'content' => 'required|max:100',

        ]);

        $post = Post::findOrFail($id);

        $making = new Comment();
        $making->content = $setcontent;
        $making->post_id = $post->id;
        $making->user_name = Auth::user()->name;

        $making->user_id = Auth::user()->id;


        $making->save();


        return redirect()->back();
    }

    public function commentdelete($cid)
    {

        Alert::success('Jobs done', 'your comment deleted');
        $comment = Comment::find($cid);
        $comment->delete();

        return back();
    }

    public function commentUpdate(Request $request, $cid)
    {
        $request->validate([
            'content2' => 'required|max:100',

        ]);



        // $comment = Comment::where('cID', $cID)->first();




        $comment = Comment::find($cid);



        $comment->content = $request->content2;


        $comment->save();


        Alert::success('Jobs done', 'your comment has been updated');
        return redirect()->back();
    }

    public function createReply(Request $request, $rid)
    {
        $reply = new Reply();

        $reply->replyContent = $request->replyContent;
        $reply->user_name = Auth::user()->name;
        $reply->comment_id = $rid;



        $reply->save();

        return redirect()->back();
    }

    public function destory($rid)
    {
        $replies = Reply::findOrFail($rid);
        $replies->delete();
        Alert::success('Jobs done', 'Your reply has been deleted');


        return redirect()->back();
    }
}
