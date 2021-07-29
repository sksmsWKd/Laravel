<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function commentSave(Request $request)
    {








        $request->validate([
            'content' => 'required|max:100',
            'userName' => 'required',
            'userId' => 'required'
        ]);

        $making = new Comment();
        $making->content =  $request->content;
        $making->userName = Auth::user()->name;
        $making->userId = Auth::user()->id;

        $making->save();
        return redirect();
    }
}
