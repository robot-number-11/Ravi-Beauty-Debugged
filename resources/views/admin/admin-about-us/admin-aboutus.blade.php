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
        @if (count($about) < 1)
            <a href="{{ route("admin-about.create") }}">ایجاد درباره ما جدید</a>
        @endif
    </div>
    @if ($about)

        <div class="banner-contianer">
            <div class="banner">
                @foreach ($about as $a)
                    <h2>{{ $a->title }}</h2>
                    <p>{{ Str::limit($a->description, 200 , '...') }}</p>
                    <img src="{{ asset("storage/database-images/about-us/$a->image") }}" alt="">
                    <a class="update" href="{{ route("admin-about.edit" , ["admin_about" => $a]) }}">ویرایش</a>
                    <a class="delete" href="{{ route("admin-about.destroy" , ["admin_about" => $a]) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        حذف
                    </a>
                    <form id="delete-form" action="{{ route("admin-about.destroy" , ["admin_about" => $a]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                    </form>
                @endforeach
            </div>
        </div>

    @endif
</body>
</html>
