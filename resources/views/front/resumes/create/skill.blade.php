@extends('front.layouts.master')

@section('title', 'Skills - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_skill_title'), 'text' => trans('app.resume_skill_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.skill') }}" method="post" class="form">
        @csrf
        <div class="row align-items--center">
            <div class="col-lg-6 resume__skill__form">
                <!-- skill & level -->

                <div class="row mb-4">
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.skill'),
                            'name' => 'name',
                            'required' => true,
                        ])
                    </div>
                    <div class="col-md-6">
                        <label class="form__label">
                            {{ trans('app.level') }}
                        </label>
                        <select class="form__el"  name="level">
                            <option value="">Select a level</option>
                            <option value="1">Trainee</option>
                            <option value="2">Novice</option>
                            <option value="3">Proficent</option>
                            <option value="4">Expert</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 resume__skill__image">
                <img src="{{ asset('img/skill.svg') }}" alt="{{ env('APP_NAME') }}">
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
                    {{ trans('actions.next_languages') }}
                </button>
            </div>
        </div>
        </form>
    </div>
    
</section>
@endsection