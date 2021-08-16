<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Comment;
use App\Models\Feeling;
use App\Models\Mycheck;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

use function PHPSTORM_META\map;

class PostsController extends Controller
{


    // public function hihi2()
    // {
    //     return view('hihi2');
    // }


    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
        //안에있는 모든 메서드로 연결되는 라우터는 auth 미들웨어가 지정이 된다.
        //exception 반대는 only 로 지정한다.
    }







    protected function uploadPostImage($request)
    {



        $name = $request->file('imageFile')->getClientOriginalName();




        $extension = $request->file('imageFile')->extension();


        // dd($name . 'extension : ' . $extension);


        $nameWithoutExtension = Str::of($name)->basename('.' . $extension);



        $fileName = $nameWithoutExtension . '_' . time() . '.' . $extension;

        //$fileName = 'spaceship'.'_'.'123123'.'jpg';



        //↓ ↓ ↓ 확장자를 제외한 이미지이름 dd했다.

        // dd($nameWithoutExtension);



        $request->file('imageFile')->storeAs('public/images/', $fileName);

        //그 파일 이름을 

        //∨ 처럼 컬럼에 설정



        return $fileName;
    }








    public function create()
    {


        return view('posts.create');
    }










    public function store(Request $request)
    { //요청정보가 객체에 담겨 옴
        //라라벨의 서비스 컨테이너에 주세요 하면 호출하면서 객체를 주입시켜줌
        //reqest 안에 사용자가 입력한 정보가 들어있다
        // $request->input['title'];
        // $request->input['content'];

        //form 에 input name 태그 값
        //객체 멤버 접근시 ->사용


        //동적 프로퍼티
        $title = $request->title;
        $content = $request->content;

        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'imageFile' => 'image|max:20000' //jpg..png..등등..

            //require 은 규칙임 필수

            //세선에 오류 내용을 넣어줌
        ]);


        //내가 원하는 형태로 데이터가 왔는지 점검 ? 
        //내가 원하는 데이터가 아니면 입력된 페이지로 back

        // dd($request);
        //객체에 사용자가 작성한 정보가 있다


        //DB에 저장

        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        //users table 에 id  값 받기
        //로그인한 사용자의 유저 객체를 줌


        //파일 처리
        //내가 원하는 파일시스템 상의 위치에 원하는 이름으로 
        //파일을 저장하고
        if ($request->file('imageFile')) {
            $post->image = $this->uploadPostImage($request);
        }
        $post->save();
        //결과 뷰를 반환
        return redirect('/posts/index');
        //결과를 보고싶으면 get 방식으로 요청을 다시 보내세요~


        //return view('posts.index');
        //return view 는 blade

        //데이터 관련 설정은 config 에 database.php
    }










    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->get();
        //$posts = Post::latest('created_at')->get();


        //쿼리빌더 return  ,   ->해서 where절 가능 , 정보 얻으려면 get(); 함.

        $posts = Post::latest()->paginate(5);

        //paginate 는 마지막에 사용.

        //dd($posts[0]->created_at);

        return view('posts.index', ['posts' => $posts]);
        //view 한테 데이터를 주고 데이터를 받아서 동적으로 생성
    }









    public function edit(Request $request, Post $post)
    //id가 몇번인 것을 edit 할지..
    {
        //$post = Post::find($id);

        //$post = Post::where('id', $id)->first();
        //파사드로 찾음
        return view('posts.edit')->with(['post' => $post, 'page' => $request->page]);
        //원래 글은 이것
    }








    public function update(Request $request, $id)

    //서비스 컨테이너로 injection 받을객체는 라우트 파라미터 앞에
    //이미지 파일 수정, 파일 시스템에서
    //게시글을 데이터베이스에서 수행
    {


        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'imageFile' => 'image|max:20000' //jpg..png..등등..

            //require 은 규칙임 필수

            //세선에 오류 내용을 넣어줌
        ]);


        $post = Post::find($id);

        if ($request->file('imageFile')) {
            $imagePath = 'public/images/' . $post->image;
            Storage::delete($imagePath);
            $post->image = $this->uploadPostImage($request);
        }

        //Authorization 즉 , 수정 권한이 있는지 검사
        // 로그인한 사용자와 게시글의 작성자가 같은지

        //1. 아래처럼 권한제어

        // if (auth()->user()->id != $post->user_id) {
        //     abort(403);
        // }

        //2. 아래처럼 권한제어
        //policy 를 만들었으면 이렇게 할수있다.

        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }





        // if ($request->file('imageFile')) {
        //     $request->file('imageFile');
        // }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.show', ['id' => $id, 'page' => $request->page]);
        //페이지 정보를 같이 줘야함

    }







    public function destroy(Request $request, $id)
    // 파일 시스템에서 이미지 파일 삭제.
    //게시글을 db에서 삭제.    
    {

        $post = Post::findOrFail($id);


        //Authorization 즉 , 수정 권한이 있는지 검사
        // 로그인한 사용자와 게시글의 작성자가 같은지

        //1. 아래처럼 권한제어

        // if (auth()->user()->id != $post->user_id) {
        //     abort(403);
        // }

        //2. 아래처럼 권한제어
        //policy 를 만들었으면 이렇게 할수있다.
        if ($request->user()->cannot('delete', $post)) {
            abort(403);
        }


        $page = $request->page;
        if ($post->image) {
            $imagePath = 'public/images/' . $post->image;
            Storage::delete($imagePath);
        }
        //DB에서 삭제하는 메소드
        //DB에 IMAGE가 NULL값-> 이미지 없음    OR   이미지 NULL 아님 -> 이미지 있음
        $post->delete();

        return redirect()->route('posts.index');
    }









    public function show(Request $request, $id)
    //인젝션 먼저,  라우트 파라미터는 나중에
    {



        $page = $request->page;
        $post = Post::findOrFail($id);
        // $post->count++;//조회수증가
        // $post->save();//db에반영


        $comment = new Comment();

        $comments = $comment::all();

        $feeling = new Feeling();
        $feelings = $feeling::all();




        /*
        이 글을 조회한 사용자들 중에, 현재
        로그인한 사용자가 포함되어 있는지를 체크하고 
        포함되어있지 않으면 추가
        포함되어 있으면 다음 단계로 넘어감
        */

        if (Auth::user() != null && !$post->viewers->contains(Auth::user())) {
            $post->viewers()->attach(Auth::user()->id);
        }


        $get = DB::table('comments')->select('post_id', DB::raw('count(*)as cID'))->groupBy('post_id')->where('post_id', $id)->get();

        $getget = json_decode($get, true);


        return view('posts.show', compact('post', 'page', 'comments', 'getget', 'feelings', 'feeling'));
    }




    public function checkdelete(Request $request, $checkId)
    {






        DB::table('mychecks')->where('checkId',  $checkId)->delete();

        // $allcheck = Mycheck::all()->where('checkId', $checkIdId);
        // $allcheck->DB::delete();










        // return redirect()->route('checklist', ['checkId' => $checkId]);
        return redirect('checklist');
    }




    public function checklist()
    {

        $check = new Mycheck();
        $checks = $check::all();
        return view('checklist', compact('check', 'checks'));
    }

    public function checkstore(Request $request)
    {



        $info = $request->checkName;

        $check = new Mycheck();
        $checks = $check::all();
        $check->checklistInfo =  $info;
        $check->user_id = Auth::user()->id;
        $check->save();
        return redirect()->route('checklist', ['checks' => $checks, 'check' => $check]);


        //route('post.show', ['id' => $id, 'page' => $request->page]);
    }

    public function mylists()
    {
        $posts = auth()->user()->posts()->latest()->paginate(5);
        // $posts = auth()->user()->posts()->orderby('title')->paginate(5);
        // $posts = Post::latest()->paginate(5);

        return view('posts.mylists', ['posts' => $posts]);
    }



    public function search(Request $request)
    {


        $word = $request->input('search');

        $searches = Post::search($word)->get();
        return view('posts.search', (['word' => $word, 'searches' => $searches]));
    }
}
