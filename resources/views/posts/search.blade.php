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
                    {{ __('SEARCH') }}


                </h2>



            </x-slot>


            <div class="container mt-3">

                <div class="mt-5">
                    <form action="{{ route('post.search') }}">
                        <input type="text" style="background-color: rgb(24, 26, 27)" id="search" name="search"
                            placeholder="마지막 검색어 :{{ $word }}">
                        <button type="submit" style=" color :lavender" class="btn btn-dark">search</button>
                    </form>
                </div>
                @if ($word)
                    <ul class="list-group">

                        <div class="text-gray-400">
                            @foreach ($searches as $search)


                                <li class="list-group-item">

                                    <div class="items-center">
                                        <span>
                                            {{-- , 'page' => $posts->currentPage() --}}
                                            <a href="{{ route('post.show', ['id' => $search->id]) }}"
                                                style=" color :lavender">
                                                Title : {{ $search->title }}

                                            </a>

                                        </span>
                                    </div>

                                    <br>
                                    <div>
                                        {{-- {{ $post->content }} --}}
                                        {!! $search->content !!}
                                    </div>
                                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; written on
                                        {{ $search->created_at->diffforHumans() }}</span>
                                    {{-- count 는 함수 --}}


                                    <div>
                                        written by {{ $search->user->name }}
                                    </div>
                                    <div>
                                        {{ $search->viewers->count() }}
                                        {{ $search->viewers->count() > 0 ? Str::plural('view', $search->viewers->count()) : 'view' }}
                                        {{-- 뒤의인자가 단수/복수에 따라 복수형태로도 가능 --}}
                                    </div>

                                </li>
                            @endforeach



                            {{-- 내부 스타일은 tailwind 지금 스타일링은 부트스트랩으로 되어서 큰화살표 나옴 --}}
                        </div>
                    </ul>
                @endif

            </div>

        </x-app-layout>
    </div>
</body>


</html>
