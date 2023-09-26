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
        <form action="{{ route("admin-product.update" , ['admin_product' => $admin_product]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div>
                <label for="title">عنوان</label>
                <input type="text" name="title" id="title" value="{{ $admin_product->title }}">
            </div>

            <div>
                <label for="price">قیمت</label>
                <input type="number" name="price" id="price" value="{{ $admin_product->price }}">
            </div>

            <div>
                <select name="category" id="category">
                    <option value="hair">مو</option>
                    <option value="perfume">عطر و ادکلن</option>
                    <option value="makeup">آرایشی</option>
                    <option value="sanitary">بهداشتی</option>
                  </select>
                  <label for="category">دسته بندی</label>
            </div>

            <div>
                <label for="image">تصویر</label>
                <input type="file" name="image" , id="image">
                <img src="{{ asset("storage/database-images/product/$admin_product->image") }}" alt="">
            </div>
            <div class="btn">
                <button type="submit">ویرایش محصول</button>
            </div>
        </form>
    </div>
</body>
</html>
