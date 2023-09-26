@extends("layouts.master")

@section("css")
    {{ asset("css/auth/style.css") }}
@endsection

@section("title")
    {{ "فراموشی گذرواژه" }}
@endsection

@section("content")
    <div class="form-cont">
        <ul class="errors">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <h1>تغییر گذرواژه</h1>
            <div class="email">
                <label for="email">ایمیل</label>
                <input type="email" id="email" name="email" >
            </div>
            <button type="submit">ارسال لینک تغییر گذرواژه</button>
        </form>
    </div>
@endsection
