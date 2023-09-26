<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/weblog-page.css")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<body>

    <div class="info">
        <h1>وبلاگ فروشگاه لوازم آراشی و بهداشتی راوی بیوتی</h1>
        <a href="{{route("blog.create")}}">ایجاد پست جدید</a>
    </div>

    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <img src="{{asset("storage/database-images/blog/$post->image")}}" alt="">
                <h1>{{$post->title}}</h1>
                <p>{{ Str::limit($post->description, 200 , '...') }}</p>
                <a href="{{route("blog.show" , ["blog" => $post])}}">مشاهده</a>
            </div>
        @endforeach
    </div>
    <div class="paginate">
        {{ $posts->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
