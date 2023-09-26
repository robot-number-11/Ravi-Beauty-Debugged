@extends("layouts.master")

@section("css")
    {{ asset("css/auth/style.css") }}
@endsection

@section("title")
    {{ "تغییر گذرواژه" }}
@endsection

@section("content")
    <div class="form-cont">
        <ul class="errors">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
        <form action="{{ route("password.update") }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h1>تغییر گذرواژه</h1>

            <div class="email">
                <label for="email">ایمیل</label>
                <input type="email" id="email" name="email" value="{{$request->email ?? old("email")}}">
            </div>
            <div class="password">
                <label for="passsword">گذرواژه جدید</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="password-confirm">
                <label for="passsword-confirm">تکرار گذرواژه جدید</label>
                <input type="password" id="password-confirm" name="password_confirmation">
            </div>
            <button type="submit">تغییر گذرواژه</button>
        </form>
    </div>
@endsection
