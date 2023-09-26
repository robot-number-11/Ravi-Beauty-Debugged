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
        <form action="{{ route("admin-brand.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="brand">برند</label>
                <input type="text" name="brand" id="brand">
            </div>

            <div>
                <label for="image">تصویر</label>
                <input type="file" name="image" , id="image">
            </div>
            <div class="btn">
                <button type="submit">ایجاد بنر</button>
            </div>
        </form>
    </div>
</body>
</html>
