@extends('front.layouts.master')

@section('title', 'Description - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_description_title'), 'text' => trans('app.resume_description_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.description') }}" method="post" class="form">
        @csrf
        <div class="row align-items--center">
            <div class="col-lg-6 resume__description__form">

                <!-- description -->
                @include('front.partials.formbox', [
                    'label' => trans('app.description'),
                    'name' => 'name',
                    'required' => true,
                    'el' => 'textarea'
                ])

            </div>
            <div class="col-lg-6 resume__skill__image">
                <img src="{{ asset('img/description.svg') }}" alt="{{ env('APP_NAME') }}">
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
                    {{ trans('actions.next_skills') }}
                </button>
            </div>
        </div>
        </form>
    </div>
    
</section>
@endsection