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



    <style>
        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .p-6.bg-white.border-b.border-gray-200 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.border-b.border-gray-100 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .flex.justify-between.h-16 {
            background-color: rgb(24, 26, 27);
        }

        .flex {
            background-color: rgb(24, 26, 27);
        }


        .header {
            background-color: rgb(24, 26, 27);
        }

        header {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }



        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .list-group-item {
            background-color: rgb(24, 26, 27);
            border-color: darkslategray;
        }

        .head2 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .p-6.bg-white.border-b.border-gray-200 {
            background-color: rgb(24, 26, 27);
        }

        header {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        body {
            background-color: rgb(30, 32, 34);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }



        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }



        .max-w-7xl.mx-auto.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27) !important;
        }

        .bg-white {
            background-color: rgb(24, 26, 27) !important;
        }

    </style>
</head>

<body>
    <div class="divdiv">
        <x-app-layout>

            <x-slot name="header">

                <h2 class="font-semibold text-xl text-gray-300 leading-tight">
                    {{ __('My POST LISTS') }}
                </h2>

            </x-slot>


            <div class="container mt-3">
                {{-- <a href="{{ route('dashboard') }}">dashboard</a> --}}
                {{-- <h1> index입니다</h1> --}}
                @auth
                    {{-- <div> <a href="/posts/create" " style=" color :lavender"> 게시글 작성</a> --}}
                    <div class=" ml-3">
                        <button type="button" onclick="location.href='/posts/create'" style=" color :lavender"
                            class="btn btn-dark">
                            write</button>
                    </div>
                    <br>
                @endauth
                <ul class="list-group">

                    <div class="text-gray-400">
                        @foreach ($posts as $post)
                            @if (Auth::user()->id == $post->user_id)
                                <li class="list-group-item">

                                    <div class="items-center">
                                        <span>

                                            <a href="{{ route('post.show', ['id' => $post->id, 'page' => $posts->currentPage()]) }}"
                                                style=" color :lavender">
                                                Title : {{ $post->title }}

                                            </a>

                                        </span>
                                    </div>

                                    <br>
                                    <div>
                                        {{-- {{ $post->content }} --}}
                                        {!! $post->content !!}
                                    </div>
                                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; written on
                                        {{ $post->created_at }}</span>

                                    <div>
                                        written by {{ $post->user->name }}
                                    </div>
                                    <div>
                                        {{ $post->viewers->count() }}
                                        {{ $post->viewers->count() > 0 ? Str::plural('view', $post->viewers->count()) : 'view' }}
                                        {{-- 뒤의인자가 단수/복수에 따라 복수형태로도 가능 --}}
                                    </div>
                                </li>
                            @endif
                        @endforeach
                        {{-- 내부 스타일은 tailwind 지금 스타일링은 부트스트랩으로 되어서 큰화살표 나옴 --}}
                    </div>
                </ul>
                <div class="mt-5">
                    {{ $posts->links() }}
                    {{-- 자동으로 생긴 메서드. 링크 만들어 줌 --}}
                </div>


            </div>


        </x-app-layout>
    </div>
</body>


</html>
