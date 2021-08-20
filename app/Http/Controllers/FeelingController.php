<?php

namespace App\Http\Controllers;

use App\Models\Feeling;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FeelingController extends Controller
{
    //
    public function addLike($id)
    {
        $feeling = new Feeling();

        $feeling->post_id = $id;
        $feeling->user_id = Auth::user()->id;



        $feeling->like = 1;

        $feeling->check = 1;



        if (DB::table('feelings')->where('post_id',  $feeling->post_id)->where('user_id',  Auth::user()->id)->exists()) {


            Alert::warning('Please push feeling button once', 'You already pushed!');
            return redirect()->route('post.show', ['feeling' => $feeling, 'id' => $id]);
        } else {
            $feeling->save();

            return redirect()->route('post.show', ['feeling' => $feeling, 'id' => $id]);
        }

        // 문제1 dd찍으면 빈 배열 반환
        // 문제2 show 에서 게시글마다의 like가 보여야함 지금은 토탈만.
    }

    // if (!$feeling->user_id->contains((Auth::user()->id)) && (!$feeling->post_id->contains(($id)))) {
    //     }
    public function addDislike($id)
    {

        $feeling = new Feeling();

        $feeling->post_id = $id;
        $feeling->user_id = Auth::user()->id;



        $feeling->dislike = 1;

        $feeling->check = 1;


        if (DB::table('feelings')->where('post_id',  $feeling->post_id)->where('user_id',  Auth::user()->id)->exists()) {


            Alert::warning('Please push feeling button once', 'You already pushed!');
            return redirect()->route('post.show', ['feeling' => $feeling, 'id' => $id]);
        }
        $feeling->save();
        return redirect()->route('post.show', ['feeling' => $feeling, 'id' => $id]);
    }
}
