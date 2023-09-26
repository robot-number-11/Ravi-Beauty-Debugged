<header>
    <div class="header">
        <nav class="navbar">
            <a href="#">خانه</a>
            <a href="#">محصولات</a>
            <a href="#">برندها</a>
            <a href="{{route("blog.index")}}">وبلاگ</a>
            @if (!(Gate::allows("auth")))
                <a href="{{route("login")}}">ورود</a>
                <a href="{{route("register")}}">ثبت نام</a>
            @endif
            <a href="#">ارتباط با ما</a>
            <a href="">سبد خرید</a>
            @if (Gate::allows("is_admin"))
                <a href="{{ route("admin-panel") }}">پنل ادمین</a>
            @endif
            @if (Gate::allows("auth"))
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    خروج
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endif

        </nav>
        <a class="logo" href="#"><strong>Ravi Beauty</strong><i class="fa fa-female logo-icon"></i></a>
    </div>


</header>
