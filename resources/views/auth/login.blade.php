@extends("layouts.master")

@section("css")
    {{ asset("css/auth/style.css") }}
@endsection

@section("title")
    {{ "ورود" }}
@endsection

@section("content")
    <div class="form-cont">
        <ul class="errors">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
        <form action="{{ route("login") }}" method="POST">
            @csrf
            <h1>ورود</h1>
            <div class="username">
                <label for="username"> نام کاربری</label>
                <input type="text" id="username" name="username" value="{{ old("username")}}">
            </div>
            <div class="password">
                <label for="passsword">گذرواژه</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="forget"><a href="{{ route("password.request") }}">فراموشی رمز عبور</a></div>
            <button type="submit">ورود</button>
            <div class="info">
                <a href="{{ route("register") }}">ثبت نام</a>
                <p>حساب کاربری ندارید؟</p>
            </div>
        </form>
    </div>
@endsection

