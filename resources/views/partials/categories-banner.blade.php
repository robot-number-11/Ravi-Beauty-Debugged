@php
    use App\Models\CategoryBanner;
    $categories = CategoryBanner::all();
@endphp

<section>
    <div class="product-category">
            @foreach ($categories as $category)
                <div>
                    <img src="{{ asset("storage/database-images/category/$category->image") }}" alt="">
                    <div>
                        <p>{{ $category->title }}</p>
                        <button>مشاهده</button>
                    </div>
                </div>
            @endforeach
    </div>
</section>
