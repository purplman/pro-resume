@extends('front.layouts.master')

@section('title', 'Languages - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_language_title'), 'text' => trans('app.resume_language_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.language') }}" method="post" class="form">
        @csrf
        <div class="row align-items--center">
            <div class="col-lg-6 resume__language__form">

                <!-- language & level -->

                <div class="row mb-4">
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.language'),
                            'name' => 'name',
                            'required' => true,
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.level'),
                            'name' => 'level',
                            'required' => false,
                        ])
                    </div>
                </div>
            </div>
            <div class="col-lg-6 resume__skill__image">
                <img src="{{ asset('img/language.svg') }}" alt="{{ env('APP_NAME') }}">
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-6">
                <a href="">
                    {{ trans('actions.back') }}
                </a>
            </div>
            <div class="col-md-6 d-flex justify-content--end">
                <button class="btn btn--primary" type="submit">
                    {{ trans('actions.next_description') }}
                </button>
            </div>
        </div>
        </form>
    </div>
    
</section>
@endsection