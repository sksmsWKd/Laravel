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



        $post = Post::findOrFail($id);
        $request->validate([
            'content' => 'required|max:100',

        ]);



        $making = new Comment();
        $making->content  = $request->input('content');
        $making->post_id = $post->id;


        $making->save();
        return redirect();
    }
}
