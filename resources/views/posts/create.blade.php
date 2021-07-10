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
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>


    <style>
        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-focused {
            background-color: rgb(24, 26, 27) !important;
        }

        .text-white {
            background-color: rgb(30, 32, 34) !important;
        }

        .container.mt-5.text-gray-300 {
            background-color: rgb(30, 32, 34) !important;
        }

        .ck .k-editor__top.ck-reset_all {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck.ck-reset.ck-editor.ck-rounded-corners {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck.ck-editor__main {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck.ck-icon.ck-button__icon {
            background-color: white !important;
        }

        .ck.ck-button.ck-off {
            background-color: white !important;
        }

        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck-blurred.ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck.ck-editor__top.ck-reset_all {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck.ck-sticky-panel__content {
            background-color: rgb(24, 26, 27) !important;
        }

        .ck.ck-toolbar.ck-toolbar_grouping {
            background-color: rgb(24, 26, 27) !important;
        }




        .bg-white.shadow {
            background-color: rgb(24, 26, 27) !important;
        }

        .bg-white {
            background-color: rgb(24, 26, 27) !important;
        }



        .form-control {
            background-color: rgb(24, 26, 27) !important;
        }

    </style>
</head>


<body>
    <x-app-layout>
        <x-slot name="header">

            <h2 class="font-semibold text-xl text-gray-300 leading-tight">
                {{ __('CREATE') }}
            </h2>
        </x-slot>

        <div class="container mt-5 text-gray-300">
            {{-- <h1>create 입니다. </h1> --}}





            {{-- <script src=""></script> --}}

            {{-- script link 차이 --}}

            <form action="/posts/store" method="post" enctype="multipart/form-data">
                @csrf

                {{-- 토큰을 넣는다.
        내가만든 페이지로 요청이 왔구나. 피싱 사이트의 요청이 아닌것을 판단. --}}

                <div class="form-group">
                    <label for="title" id="title">title</label>

                    <input type="text" name="title" class="form-control" id="title" style="color:white">


                    @error('title')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group text-gray-300 ">
                    <label for="content">content</label>
                    <div class="text-white ">
                        <textarea name="content" class="form-control" id="content"> {{ old('content') }}</textarea>
                    </div>

                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#content'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>

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
                <div><button type="submit" style=" color :lavender" class="btn btn-secondary">완료</button>
                    &nbsp; &nbsp;

                    <button type="button" onclick="location.href='/posts/index'" style=" color :lavender"
                        class="btn btn-dark">
                        취소</button>

                </div>


            </form>


        </div>
    </x-app-layout>
</BODY>

</html>
