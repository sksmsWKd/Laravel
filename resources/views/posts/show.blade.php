<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        h1 {
            text-align: center;
        }

    </style>
</head>

<body>

    <div class="m-5">
        <a href="{{ route('posts.index', ['page' => $page]) }}"> 목록보기</a>
    </div>
    <h1>show입니다</h1>

    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="container">


        {{-- 토큰을 넣는다.
        내가만든 페이지로 요청이 왔구나. 피싱 사이트의 요청이 아닌것을 판단. --}}



        <div class="form-group">
            <label>등록일</label>
            <input type="text" readonly class="form-control" value="{{ $post->created_at->diffforHumans() }}">


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

    </div>

    <div class="m-10">
        <button class="btn btn-warning"
            onclick="location.href='{{ route('post.edit', ['post' => $post->id]) }}'">수정</button>
        <button class="btn btn-danger"
            onclick="location.href='{{ route('post.delete', ['post' => $post->id]) }}'">삭제</button>

    </div>


</body>

</html>
