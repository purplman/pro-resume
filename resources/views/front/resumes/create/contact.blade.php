@extends('front.layouts.master')

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_contact_title'), 'text' => trans('app.resume_contact_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.store') }}" method="post" class="form">
        @csrf
        <div class="row align-items--center">
            <div class="col-lg-6 resume__contact__form">

                <!-- profession -->

                @include('front.partials.formbox', [
                    'class' => 'mb-4',
                    'label' => trans('app.profession'),
                    'name' => 'profession',
                    'required' => true,
                    'placeholder' => 'Developer'
                ])

                <!-- city & address -->

                <div class="row mb-4">
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.city'),
                            'name' => 'city',
                            'required' => true,
                            'placeholder' => 'New York'
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.address'),
                            'name' => 'address',
                            'required' => true,
                            'placeholder' => 'Broadway str.'
                        ])
                    </div>
                </div>

                <!-- phone & email -->

                <div class="row mb-4">
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.phone'),
                            'name' => 'phone',
                            'required' => true,
                            'placeholder' => '(+1) 123456789'
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.email'),
                            'type' => 'email',
                            'name' => 'email',
                            'required' => true,
                            'value' => auth()->user()->email,
                            'placeholder' => 'johndoe@gmail.com'
                        ])
                    </div>
                </div>

                <!-- linkedin -->

                @include('front.partials.formbox', [
                    'label' => trans('app.linkedin'),
                    'type' => 'url',
                    'name' => 'linkedin',
                    'required' => false,
                    'placeholder' => 'https://linkedin.com/johndoe'
                ])
                

            </div>
            <div class="col-lg-6 resume__contact__image">
                <img src="{{ asset('img/get-in-touch.svg') }}" alt="">
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
                    {{ trans('actions.next_work_history') }}
                </button>
            </div>
        </div>
        </form>
    </div>
    
</section>
@endsection