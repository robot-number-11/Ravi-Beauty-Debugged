<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/admin/edit-banner.css") }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <ul class="errors">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
        <form action="{{ route("admin-banner.update" , ["admin_banner"=>$admin_banner]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div>
                <label for="title">عنوان</label>
                <input type="text" name="title" id="title" value="{{ $admin_banner->title}}">
            </div>

            <div>
                <label for="description">توضیحات</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ $admin_banner->description }}</textarea>
            </div>

            <div>
                <label for="image">تصویر</label>
                <input type="file" name="image" , id="image">
                <img src="{{ asset("storage/database-images/banner/$admin_banner->image") }}" alt="">
            </div>
            <div class="btn">
                <button type="submit">پایان ویرایش</button>
            </div>
        </form>
    </div>
</body>
</html>
