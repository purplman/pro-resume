@extends('front.layouts.master')

@section('title', 'Education - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_education_title'), 'text' => trans('app.resume_education_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.education') }}" method="post" class="form">
        @csrf
        <div class="resume__education__form mt-5">

             <!-- school name & degree -->

            <div class="row mb-4">
                <div class="col-md-6">
                    @include('front.partials.formbox', [
                        'label' => trans('app.school_name'),
                        'name' => 'school_name',
                        'required' => true,
                    ])
                </div>
                <div class="col-md-6">
                    @include('front.partials.formbox', [
                        'label' => trans('app.degree'),
                        'name' => 'degree',
                        'required' => false,
                    ])
                </div>
            </div>

            <!-- tasks -->

            @include('front.partials.formbox', [
                'class' => 'mb-3',
                'label' => trans('app.field'),
                'name' => 'field',
                'required' => false,
            ])
            

            <!-- start & end dates -->

            <div class="row mb-4">
                <div class="col-md-6">
                    @include('front.partials.formbox', [
                        'label' => trans('app.start_date'),
                        'name' => 'start_date',
                        'type' => 'date',
                        'required' => false
                    ])
                </div>
                <div class="col-md-6">
                    @include('front.partials.formbox', [
                        'label' => trans('app.end_date'),
                        'name' => 'end_date',
                        'type' => 'date',
                        'required' => false
                    ])
                </div>
            </div>

            

            <div class="form__box mb-4">
                <label>
                    <input id="check" type="checkbox" name="current" class="mr-1"> 
                    I currently attend here
                </label>
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