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
            <div class="header__right">
                @include('front.partials.button', ['href' => '', 'class' => 'primary', 'text' => trans('app.login')])
            </div>
        </div>
        <div class="hero">
            <h1 class="hero__title">
                {{ trans('app.hero_title') }}
            </h1>
            <p class="hero__text">
                {{ trans('app.hero_text') }}
            </p>
            <div class="hero__img">
                <img src="{{ asset('img/hero.svg') }}" alt="">
            </div>
        </div>
    </div>
</header>