<header>
    <div class="container">
        <div class="header">
            <div class="header__left">
                <div class="header__logo">
                    <a href="">
                        {{ env('APP_NAME') }}<span class="dot">.</span>
                    </a>
                </div>
            </div>
            <nav class="header__nav">
                <ul>
                    <li>
                        <a href="">{{ trans('app.home') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('app.about') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('app.contact') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('app.feedback') }}</a>
                    </li>
                </ul>
            </nav>
            @guest
            <div class="header__right">
                <a href="{{ route('login') }}" class="btn btn--primary">
                    {{ trans('app.login') }}
                </a>
            </div>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn--primary">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>