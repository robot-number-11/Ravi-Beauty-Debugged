<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/admin/dashboard.css") }}">
</head>
<body>
    <h1>داشبورد ادمین</h1>
    <div class="actions">
        <a href="{{ route("admin-banner.index") }}">بنرهای اصلی سایت</a>
        <a href="{{ route("admin-category.index") }}">بنرهای قسمت دسته بندی </a>
        <a href="{{ route("admin-product.index") }}">محصولات</a>
        <a href="{{ route("admin-brand.index") }}">برند ها</a>
        <a href="{{ route("admin-about.index") }}">درباره ما</a>
    </div>
</body>
</html>
