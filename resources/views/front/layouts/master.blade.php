<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        @include('front.inc.head.meta')

        <title>@yield('title', env('APP_NAME'))</title>

        @include('front.inc.head.links')

    </head>
    <body>
        <div class="app">
            @include('front.partials.header')

            <main>
                <div class="container">
                    @yield('content')
                </div>
            </main>

            @include('front.partials.footer')
        </div>
        
        @include('front.inc.scripts.swal')

        @yield('scripts')
    </body>
</html>
