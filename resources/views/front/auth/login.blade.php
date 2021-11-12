@extends('front.layouts.auth')

@section('title', trans('app.login') . ' - ' . env('APP_NAME') )

@section('content')
    <div class="auth">
        <form action="{{ route('login.post') }}" method="post" class="auth__form">
            @csrf
            
            <div class="row align-items--center">
                <div class="col-md-6">
                    @include('front.partials.intro', ['title' => trans('app.login'), 'text' => trans('app.login_to_continue')])
                    <div class="form__box mb-3 mt-5">
                        <label class="form__label">
                            {{ trans('app.email') }}
                        </label>
                        <input type="email" required name="email" class="form__el">
                    </div>
                    <div class="form__box mb-4">
                        <label class="form__label">
                            {{ trans('app.password') }}
                        </label>
                        <input type="password" required name="password" class="form__el">
                    </div>

                    <div class="form__box mb-4">
                        <input id="check" type="checkbox" name="remember" class="mr-1"> 
                        <label for="check">Remember me</label>
                    </div>
                    
                    <div class="d-flex align-items--center justify-content--between">
                        <button type="submit" class="btn btn--primary">
                            {{ trans('app.login') }}
                        </button>
    
                        <div class="form__box">
                            <a href="{{ route('register') }}">Register here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/login.svg') }}" alt="">
                </div>
            </div>
        </form>
    </div>
@endsection