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
        <form action="{{ route("admin-brand.update" , ["admin_brand" => $admin_brand]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div>
                <label for="brand">برند</label>
                <input type="text" name="brand" id="brand" value="{{ $admin_brand->brand}}">
            </div>


            <div>
                <label for="image">تصویر</label>
                <input type="file" name="image" , id="image">
                <img src="{{ asset("storage/database-images/brand/$admin_brand->image") }}" alt="">
            </div>
            <div class="btn">
                <button type="submit">پایان ویرایش</button>
            </div>
        </form>
    </div>
</body>
</html>
