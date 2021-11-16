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

                <div class="block-wrapper">
                    <div class="block">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                @include('front.partials.formbox', [
                                    'label' => trans('app.language'),
                                    'name' => 'name[]',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md-6">
                                <div class="form__box">
                                    <label class="form__label">
                                        {{ trans('app.level') }}
                                    </label>
                                <select class="form__el"  name="level[]">
                                        <option value="">Select a level</option>
                                        <option value="1">Beginner</option>
                                        <option value="2">Elementary</option>
                                        <option value="3">Intermediate</option>
                                        <option value="4">Upper Intermediate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="" id="addBlock">+ Add another</a>

            </div>
            <div class="col-lg-6 resume__skill__image">
                <img src="{{ asset('img/language.svg') }}" alt="{{ env('APP_NAME') }}">
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('resumes.create.skill') }}">
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


@section('scripts')
    @include('front.inc.scripts.addBlock')
@endsection