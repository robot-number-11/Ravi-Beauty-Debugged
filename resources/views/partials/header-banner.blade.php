@php
    use App\Models\HeaderBanner;
    $banners = HeaderBanner::all();
@endphp

<section class="banner">
    <div class="imgBx">
        @foreach ($banners as $banner)
            <img src="{{ asset("storage/database-images/banner/$banner->image") }}" alt="">
        @endforeach
    </div>
    <div class="contentBx">
        @foreach ($banners as $banner)
            <div>
                <h2>{{ $banner->title }}</h2>
                <p>{{ $banner->description }}</p>
            </div>

        @endforeach
    </div>

    <script src="{{ asset("js/amin-banner-slider.js")}}"></script>

</section>
