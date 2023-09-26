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
        <a href="{{ route("admin-banner.create") }}">ایجاد بنر جدید</a>
    </div>
    @if ($banners)

        <div class="banner-contianer">
            @foreach ($banners as $banner)
                <div class="banner">
                    <h2>{{ $banner->title }}</h2>
                    <p>{{ Str::limit($banner->description, 200 , '...') }}</p>
                    <img src="{{ asset("storage/database-images/banner/$banner->image") }}" alt="">
                    <a class="update" href="{{ route("admin-banner.edit" , ["admin_banner" => $banner]) }}">ویرایش</a>
                    <a class="delete" href="{{ route("admin-banner.destroy" , ["admin_banner" => $banner]) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        حذف
                    </a>
                    <form id="delete-form" action="{{ route("admin-banner.destroy" , ["admin_banner" => $banner]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                    </form>
                </div>
            @endforeach
        </div>

    @endif
</body>
</html>
