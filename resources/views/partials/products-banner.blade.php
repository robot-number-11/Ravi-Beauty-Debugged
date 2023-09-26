@php
    use App\Models\ProductBanner;
    $products = ProductBanner::all();
@endphp

<section>
    <div id="popular" class="popular">
        <p>پر فروش ترین محصولات</p>
        <div class="pop-container">
            @foreach ($products as $product)
                <div class="pop">
                    <img src="{{ asset("storage/database-images/product/$product->image") }}" alt="">
                    <p class="price">تومن {{ $product->price }}</p>
                    <p>{{ $product->title }}</p>
                </div>
            @endforeach
            <ul class="pop-control">
                <li onclick="nextPopular()"></li>
                <li onclick="prevPopular()"></li>
            </ul>
        </div>
    </div>

    <script src="{{ asset("js/product-slider.js") }}"></script>

</section>


