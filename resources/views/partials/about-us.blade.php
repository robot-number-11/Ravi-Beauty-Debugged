@php
    use App\Models\AboutUs;
    $about = AboutUs::all();
@endphp

<section id="about-us" class="about-us">
    @foreach ($about as $a)
        <div>
            <h1>{{$a->title}}</h1>
            <p>{{$a->description}}</p>
        </div>
        <img src="{{ asset("storage/database-images/about-us/$a->image") }}" alt="">
    @endforeach
</section>
