@extends('front.layouts.master')

@section('title', 'Work history - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_experience_title'), 'text' => trans('app.resume_experience_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.experience') }}" method="post" class="form">
        @csrf
        <div class="resume__experience__form mt-5">
             <!-- job title & employeer -->

             <div class="row mb-4">
                <div class="col-md-6">
                    @include('front.partials.formbox', [
                        'label' => trans('app.job_title'),
                        'name' => 'title',
                        'required' => true,
                    ])
                </div>
                <div class="col-md-6">
                    @include('front.partials.formbox', [
                        'label' => trans('app.employeer'),
                        'name' => 'employeer',
                        'required' => true,
                    ])
                </div>
            </div>
            

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

            <!-- tasks -->

            @include('front.partials.formbox', [
                'class' => 'mb-3',
                'label' => trans('app.tasks'),
                'name' => 'tasks',
                'required' => false,
                'el' => 'textarea'
            ])

            <div class="form__box mb-4">
                <label>
                    <input id="check" type="checkbox" name="current" class="mr-1"> 
                    I currently work here
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
                    {{ trans('actions.next_education') }}
                </button>
            </div>
        </div>
        </form>
    </div>
    
</section>
@endsection