<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
        //안에있는 모든 메서드로 연결되는 라우터는 auth 미들웨어가 지정이 된다.
        //exception 반대는 only 로 지정한다.
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
            $name = $request->file('imageFile')->getClientOriginalName();


            $extension = $request->file('imageFile')->extension();

            // dd($name . 'extension : ' . $extension);
            $nameWithoutExtension = Str::of($name)->basename('.' . $extension);

            $fileName = $nameWithoutExtension . '_' . time() . '.' . $extension;
            //$fileName = 'spaceship'.'_'.'123123'.'jpg';

            //↓ ↓ ↓ 확장자를 제외한 이미지이름 dd했다.
            // dd($nameWithoutExtension);

            $request->file('imageFile')->storeAs('public/images', $fileName);
            //그 파일 이름을 
            //∨ 처럼 컬럼에 설정

            $post->image = $fileName;
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


    public function edit()
    {
        // return view('posts.edit');
    }
    public function update()
    {
        return 0;
    }

    public function destroy()
    {
        return 0;
    }
    public function show(Request $request, $id)
    //인젝션 먼저,  라우트 파라미터는 나중에
    {

        $page = $request->page;
        $post = Post::find($id);

        return view('posts.show', compact('post', 'page'));
    }
}
