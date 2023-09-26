<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/admin/create-banner.css") }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <ul class="errors">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
        <form action="{{ route("blog.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">عنوان</label>
                <input type="text" name="title" id="title">
            </div>

            <div>
                <label for="description">توضیحات</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label for="image">تصویر</label>
                <input type="file" name="image" , id="image">
            </div>
            <div class="btn">
                <button type="submit">ایجاد پست</button>
            </div>
        </form>
    </div>
</body>
</html>
