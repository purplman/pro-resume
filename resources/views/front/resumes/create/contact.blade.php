@extends('front.layouts.master')

@section('title', 'Contact details - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_contact_title'), 'text' => trans('app.resume_contact_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.contact') }}" method="post" class="form">
        @csrf
        <div class="row align-items--center">
            <div class="col-lg-6 resume__contact__form">

                <!-- profession -->

                @include('front.partials.formbox', [
                    'class' => 'mb-4',
                    'label' => trans('app.profession'),
                    'name' => 'profession',
                    'required' => true,
                    'placeholder' => 'Developer',
                    'value' => auth()->user()->resume->profession ?? ''
                ])

                <!-- city & address -->

                <div class="row mb-4">
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.city'),
                            'name' => 'city',
                            'required' => true,
                            'placeholder' => 'New York',
                            'value' => auth()->user()->resume->contact->city ?? ''
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.address'),
                            'name' => 'address',
                            'required' => true,
                            'placeholder' => 'Broadway str.',
                            'value' => auth()->user()->resume->contact->address ?? ''
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
                            'placeholder' => '(+1) 123456789',
                            'value' => auth()->user()->resume->contact->phone ?? ''
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('front.partials.formbox', [
                            'label' => trans('app.email'),
                            'type' => 'email',
                            'name' => 'email',
                            'required' => true,
                            'value' => auth()->user()->email,
                            'placeholder' => 'johndoe@gmail.com',
                            'value' => auth()->user()->resume->contact->email ?? auth()->user()->email
                        ])
                    </div>
                </div>

                <!-- linkedin -->

                @include('front.partials.formbox', [
                    'label' => trans('app.linkedin'),
                    'type' => 'url',
                    'name' => 'linkedin',
                    'required' => false,
                    'placeholder' => 'https://linkedin.com/johndoe',
                    'value' => auth()->user()->resume->contact->linkedin ?? ''
                ])
                

            </div>
            <div class="col-lg-6 resume__contact__image">
                <img src="{{ asset('img/get-in-touch.svg') }}" alt="{{ env('APP_NAME') }}">
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