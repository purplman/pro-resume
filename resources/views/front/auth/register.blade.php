@extends('front.layouts.auth')

@section('title', trans('app.register') . ' - ' . env('APP_NAME') )

@section('content')
    <div class="auth">
        <form action="{{ route('register.post') }}" method="post" class="auth__form">
            @csrf
            
            @if (count($errors))
                @foreach ($errors->all() as $item)
                    {{ $item }} <br>
                @endforeach
            @endif

            <div class="row align-items--center">
                <div class="col-md-6">
                    @include('front.partials.intro', ['title' => trans('app.register'), 'text' => trans('app.create_an_account')])

                    <!-- firstname & lastname -->

                    <div class="row mb-4 mt-5">
                        <div class="col-md-6">
                            <div class="form__box">
                                <label class="form__label">
                                    {{ trans('app.firstname') }}
                                </label>
                                <input type="text" required name="firstname" class="form__el" placeholder="ex. John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form__box">
                                <label class="form__label">
                                    {{ trans('app.lastname') }}
                                </label>
                                <input type="text" required name="lastname" class="form__el" placeholder="ex. Doe">
                            </div>
                        </div>
                    </div>

                    <!-- email -->

                    <div class="form__box mb-4">
                        <label class="form__label">
                            {{ trans('app.email') }}
                        </label>
                        <input type="email" required name="email" class="form__el">
                    </div>

                    <!-- password -->

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form__box">
                                <label class="form__label">
                                    {{ trans('app.password') }}
                                </label>
                                <input type="password" required name="password" class="form__el">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form__box">
                                <label class="form__label">
                                    {{ trans('app.password_confirm') }}
                                </label>
                                <input type="password" required name="password_confirmation" class="form__el">
                            </div>
                        </div>
                    </div>

                    <div class="form__box mb-4">
                        <input id="check" type="checkbox" name="accepted" class="mr-1"> 
                        <label for="check">I've read and agreed with <a href="" class="link">Terms & Conditions</a></label>
                    </div>
                    
                    <div class="d-flex align-items--center justify-content--between">
                        <button type="submit" class="btn btn--primary">
                            {{ trans('app.register') }}
                        </button>
    
                        <div class="form__box">
                            <a href="{{ route('login') }}">Login here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/login.svg') }}" alt="{{ env('APP_NAME') }}">
                </div>
            </div>
        </form>
    </div>
@endsection