<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/admin/banners.css") }}">
</head>
<body>
    <div class="new-banner">
        <a href="{{ route("admin-product.create") }}">ایجاد محصول جدید</a>
    </div>
    @if ($products)

        <div class="banner-contianer">
            @foreach ($products as $product)
                <div class="banner">
                    <h2>{{ $product->title }}</h2>
                    <p>{{ $product->price }}</p>
                    <p>{{ $product->category }}</p>
                    <img src="{{ asset("storage/database-images/product/$product->image") }}" alt="">
                    <a class="update" href="{{ route("admin-product.edit" , ["admin_product" => $product]) }}">ویرایش</a>
                    <a class="delete" href="{{ route("admin-product.destroy" , ["admin_product" => $product]) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        حذف
                    </a>
                    <form id="delete-form" action="{{ route("admin-product.destroy" , ["admin_product" => $product]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                    </form>
                </div>
            @endforeach
        </div>

    @endif
</body>
</html>
