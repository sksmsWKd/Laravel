<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">

    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <style>
        h1 {
            text-align: center;
        }

        button {
            align-items: center
        }

    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('게시물 상세보기') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            {{-- <a href="{{ route('posts.index', ['page' => $page]) }}" style=" color :lavender"> 목록보기</a> --}}
            <button type="button" onclick="location.href='{{ route('posts.index', ['page' => $page]) }}'"
                style=" color :lavender" class="btn btn-dark">
                목록보기</button>

        </div>
        <br>
        {{-- <h1>show입니다</h1> --}}


        <div class="container">


            {{-- 토큰을 넣는다.
        내가만든 페이지로 요청이 왔구나. 피싱 사이트의 요청이 아닌것을 판단. --}}



            <div class="form-group">
                <label>등록일</label>
                <input type="text" readonly class="form-control" value="{{ $post->created_at }}">
                {{-- ->diffforHumans() --}}


            </div>
            <div class="form-group">
                <label>수정일</label>
                <input type="text" readonly class="form-control" value="{{ $post->updated_at }}">

            </div>
            <div class="form-group">

                <label>작성자</label>
                <input type="text" readonly class="form-control" value="{{ $post->user_id }}">
            </div>
            <div class="from-group">
                <label for="imageFile">이미지</label>
                <div class="from-group">
                    <img class="img-thumbnail" width="20%" src="/storage/images/{{ $post->image ?? 'no_img.jpg' }}">
                </div>

            </div>


            {{-- input name 에 넣는것 - >컨트롤러에 리퀘스트 --}}

        </div>

        @auth
            {{-- @if (auth()->user()->id == $post->user_id)   policy 만들기 전에 권한 관리이렇게함 --}}
            @can('update', $post)
                <div class="container mt-5">

                    <div>
                        <button class="btn btn-warning"
                            onclick="location.href='{{ route('post.edit', ['post' => $post->id, 'page' => $page]) }}'">수정</button>

                        <form action="{{ route('post.delete', ['id' => $post->id, 'page' => $page]) }}" method="post">
                            {{-- querystring 으로 온것은(파라미터) request(객체에서) 빼내야함 --}}
                            @csrf
                            @method("delete")

                            <button class="btn btn-danger">삭제</button>
                            {{-- location.href - > get방식 --}}
                    </div>
                </div>
            @endcan
            {{-- @endif --}}
        @endauth

        </div>



    </x-app-layout>
</body>

</html>
