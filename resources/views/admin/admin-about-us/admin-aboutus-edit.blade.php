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
        <form action="{{ route("admin-about.update" , ["admin_about" => $admin_about]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div>
                <label for="title">عنوان</label>
                <input type="text" name="title" id="title" value="{{ $admin_about->title}}">
            </div>

            <div>
                <label for="description">توضیحات</label>
                <textarea name="description" id="description" cols="30" rows="10">{{$admin_about->description}}</textarea>
            </div>

            <div>
                <label for="image">تصویر</label>
                <input type="file" name="image" , id="image">
                <img src="{{ asset("storage/database-images/about-us/$admin_about->image") }}" alt="">
            </div>
            <div class="btn">
                <button type="submit">پایان ویرایش</button>
            </div>
        </form>
    </div>
</body>
</html>
