<section>
    <div class="weblog-info">
        <h1>وبلاگ راوی بیوتی</h1>
        <a href="{{route("blog.index")}}">مشاهده همه</a>
    </div>

    @php
        use App\Models\Blog;
        $posts = Blog::take(3)->get()
    @endphp

    <div class="weblog-container">
        @foreach ($posts as $post)
            <div>
                <img src="{{asset("storage/database-image/blog/$post->image")}}" alt="">
                <h1>{{$post->title}}</h1>
                <p>{{ Str::limit($post->description, 200 , '...') }}</p>
                <a href="{{route("blog.show" , ["blog"=>$post])}}">ادامه مطلب</a>
            </div>
        @endforeach
    </div>
</section>
