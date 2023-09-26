@php
    use App\Models\Brand;
    $brands = Brand::all();
@endphp

<section>
    <div id="brand-info" class="brand-info">
        <p>برندها</p>
        <a href="">مشاهده همه برندها</a>
    </div>
    <div class="brands">
        @foreach ($brands as $brand)
            <div class="brand"><img src="{{ asset("storage/database-images/brand/$brand->image") }}" alt=""></div>
        @endforeach
    </div>
</section>
