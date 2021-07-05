<html>

<BODY>


    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="container m-5">
        <a href="{{ route('dashboard') }}">dashboard</a>
        <h1> index입니다</h1>
        @auth
            <a href="/posts/create"> 게시글 작성</a>
        @endauth
        <ul class="list-group">


            @foreach ($posts as $post)
                <li class="list-group-item">

                    <span>
                        <a href="{{ route('post.show', ['id' => $post->id, 'page' => $posts->currentPage()]) }}">
                            Title : {{ $post->title }}
                        </a>
                    </span>


                    <div>
                        {{ $post->content }}
                    </div>
                    <span> writen on{{ $post->created_at }}</span>


                </li>
            @endforeach
            {{-- 내부 스타일은 tailwind 지금 스타일링은 부트스트랩으로 되어서 큰화살표 나옴 --}}

        </ul>
        <div class="mt-5">
            {{ $posts->links() }}
            {{-- 자동으로 생긴 메서드. 링크 만들어 줌 --}}
        </div>
    </div>
</BODY>


</html>
