<html>

<head>
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

</head>

<BODY>
    <x-app-layout>
        <x-slot name="header">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('CREATE') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            {{-- <h1>create 입니다. </h1> --}}





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
                    <br>
                    <br>
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

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div><button type="submit" style=" color :lavender" class="btn btn-warning">완료</button>
                        &nbsp; &nbsp;

                        <button type="button" onclick="location.href='/posts/index'" style=" color :lavender"
                            class="btn btn-danger">
                            취소</button>

                    </div>


            </form>


        </div>
    </x-app-layout>
</BODY>

</html>
