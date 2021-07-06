<html>

<head>
    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>

<BODY>

    <h1>edit 입니다. </h1>





    {{-- <script src=""></script> --}}

    {{-- script link 차이 --}}

    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        {{-- 이거 method 안넣으면 post 방식으로 되버림 --}}

        {{-- 토큰을 넣는다.
        내가만든 페이지로 요청이 왔구나. 피싱 사이트의 요청이 아닌것을 판단. --}}

        <div class="form-group">
            <label for="title" id="title">title</label>
            <textarea type="text" name="title" class="form-control"
                id="title">{{ old('title') ? old('title') : $post->title }}</textarea>


            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" id="content">content</label>
            <textarea class="form-control" name="content"
                id="content"> {{ old('content') ? old('content') : $post->content }}</textarea>



            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror


            <div class="form-group">
                <img class="img-thumbnail" width="20%" src="{{ $post->imagePath() }}">

            </div>

            <div class="form-group">
                <label for="image" id="image">current image</label>

                <span>
                    <textarea class="form-control" readonly> 현재 업로드된 이미지 : {{ $post->image }}
 현재 업로드된 이미지 경로 :{{ $post->imagePath() }}</textarea>

                </span>
            </div>
            <div class="form-group">
                <label for="file">file</label>
                <input type="file" id="file" name="imageFile">



                @error('imageFile')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
                {{-- input name 에 넣는것 - >컨트롤러에 리퀘스트 --}}

            </div>


            <div><button type="submit" class="btn btn-primary">글
                    작성</button>
            </div>
            <div>
                <button type="button" onclick="location.href='/posts/index'">목록으로 돌아가기</button>

            </div>


    </form>




</BODY>

</html>
