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
                            @include('front.partials.formbox', [
                                'class' => 'mb-4',
                                'label' => trans('app.firstname'),
                                'name' => 'firstname',
                                'required' => true,
                                'placeholder' => 'John'
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('front.partials.formbox', [
                                'class' => 'mb-4',
                                'label' => trans('app.lastname'),
                                'name' => 'lastname',
                                'required' => true,
                                'placeholder' => 'Doe'
                            ])
                        </div>
                    </div>

                    <!-- email -->

                    <div class="form__box mb-4">
                        @include('front.partials.formbox', [
                            'class' => 'mb-4',
                            'label' => trans('app.email'),
                            'name' => 'email',
                            'required' => true,
                            'type' => 'email',
                            'placeholder' => 'johndoe@gmail.com'
                        ])
                    </div>

                    <!-- password -->

                    <div class="row mb-4">
                        <div class="col-md-6">
                            @include('front.partials.formbox', [
                                'class' => 'mb-4',
                                'label' => trans('app.password'),
                                'name' => 'password',
                                'required' => true,
                                'type' => 'password',
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('front.partials.formbox', [
                                'class' => 'mb-4',
                                'label' => trans('app.password_confirm'),
                                'name' => 'password_confirmation',
                                'required' => true,
                                'type' => 'password',
                            ])
                        </div>
                    </div>

                    <div class="form__box mb-4">
                        <input id="check" required type="checkbox" name="accepted" class="mr-1"> 
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