<html>
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

<BODY>
    <x-app-layout>
        <x-slot name="header">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('INDEX') }}
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


                @foreach ($posts as $post)
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
                            {{ $post->content }}
                        </div>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; written on {{ $post->created_at }}</span>


                    </li>
                @endforeach
                {{-- 내부 스타일은 tailwind 지금 스타일링은 부트스트랩으로 되어서 큰화살표 나옴 --}}

            </ul>
            <div class="mt-5">
                {{ $posts->links() }}
                {{-- 자동으로 생긴 메서드. 링크 만들어 줌 --}}
            </div>


        </div>


    </x-app-layout>
</BODY>


</html>
