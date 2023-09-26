<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/single-weblog-post.css")}}">
</head>
<body>
    <div class="container">
        <img src="{{asset("images/weblog/$blog->image")}}" alt="">
        <h1>{{$blog->title}}</h1>
        <p>{{$blog->description}}</p>

        @php
            use Illuminate\Support\Facades\Gate;
        @endphp

        @can("update" , $blog)
            <a class="edit" href="{{route("blog.edit" , ["blog" => $blog])}}">ویرایش</a>
        @endcan

        @can("delete" , $blog)
            <a class="delete" href="{{ route("blog.destroy" , ["blog" => $blog]) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                حذف
            </a>
            <form id="delete-form" action="{{ route("blog.destroy" , ["blog" => $blog]) }}" method="POST">
                @csrf
                @method("DELETE")
            </form>
        @endcan
    </div>
</body>
</html>
