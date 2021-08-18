<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
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

    public function commentdelete($id)
    {
        DB::table('comments')->find($id)->delete();

        return back();
    }

    public function commentUpdate(Request $request, $id)
    {
        $request->validate([
            'content2' => 'required|max:100',

        ]);
        $setcontent2 = $request->content2;


        // $comment = Comment::where('cID', $cID)->first();
        $comment = Comment::find($id)->first();

        $comment->content = $setcontent2;


        $comment->save();
        return redirect()->back();
    }
}
