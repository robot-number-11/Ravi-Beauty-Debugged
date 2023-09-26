@extends("layouts.master")

@section("css")
    {{ asset("css/auth/style.css") }}
@endsection

@section("title")
    {{ "ثبت نام" }}
@endsection

@section("content")
    <div class="form-cont">
        <ul class="errors">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
        <form action="{{ route("register") }}" method="POST">
            @csrf
            <h1>ثبت نام</h1>
            <div class="name">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" value="{{ old("name")}}">
            </div>
            <div class="username">
                <label for="username"> نام کاربری</label>
                <input type="text" id="username" name="username" value="{{ old("username")}}">
            </div>
            <div class="email">
                <label for="email">ایمیل</label>
                <input type="email" id="email" name="email" value="{{ old("email")}}">
            </div>
            <div class="password">
                <label for="passsword">گذرواژه</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="password-confirm">
                <label for="passsword-confirm">تکرار گذرواژه</label>
                <input type="password" id="password-confirm" name="password_confirmation">
            </div>
            <button type="submit">ثبت نام</button>
            <div class="info">
                <a href="{{ route("login") }}">ورود</a>
                <p>از قبل حساب کاربری دارید؟</p>
            </div>
        </form>

    </div>
@endsection
