<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function commentdelete($cID)
    {
        DB::table('comments')->where('cID',  $cID)->delete();

        return back();
    }
}
