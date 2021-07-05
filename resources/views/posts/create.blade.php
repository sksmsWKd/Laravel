<html>

<BODY>
    <h1>create 입니다. </h1>

    <form action="/posts/store" name="title" placeholder="Title"></form>

    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- <script src=""></script> --}}

    {{-- script link 차이 --}}

    <form action="/posts/store" method="post" enctype="multipart/form-data">
        @csrf

        {{-- 토큰을 넣는다.
        내가만든 페이지로 요청이 왔구나. 피싱 사이트의 요청이 아닌것을 판단. --}}

        <div class="form-group">
            <label for="title" id="title">title</label>
            <input type="text" name="title" class="form-control" id="title">


            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" id="content">content</label>
            <input type="text" name="content" class="form-control" id="content" value="{{ old('content') }}">



            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="file" id="content">file</label>
                <input type="file" id="file" name="imageFile">



                @error('imageFile')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
                {{-- input name 에 넣는것 - >컨트롤러에 리퀘스트 --}}

            </div>



            <button type=" submit" class="btn btn-primary">Submit</button>


    </form>




</BODY>

</html>
