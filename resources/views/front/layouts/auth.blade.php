<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        @include('front.inc.head.meta')

        <title>@yield('title', env('APP_NAME'))</title>

        @include('front.inc.head.links')

    </head>
    <body>
        <div class="app">

            <main>
                <div class="container">
                    @yield('content')
                </div>
            </main>

        </div>
    </body>
</html>
