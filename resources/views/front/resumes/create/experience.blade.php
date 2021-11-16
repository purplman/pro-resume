@extends('front.layouts.master')

@section('title', 'Work history - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_experience_title'), 'text' => trans('app.resume_experience_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.experience') }}" method="post" class="form" id="experienceForm">
            @csrf
            <div class="resume__experience__form mt-5 mb-3">

                <div class="block-wrapper">
                    <div class="block">
                        <!-- job title & employeer -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                @include('front.partials.formbox', [
                                    'label' => trans('app.job_title'),
                                    'name' => 'title[]',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('front.partials.formbox', [
                                    'label' => trans('app.employeer'),
                                    'name' => 'employeer[]',
                                    'required' => true,
                                ])
                            </div>
                        </div>
                        

                        <!-- start & end dates -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                @include('front.partials.formbox', [
                                    'label' => trans('app.start_date'),
                                    'name' => 'start_date[]',
                                    'type' => 'date',
                                    'required' => false
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('front.partials.formbox', [
                                    'label' => trans('app.end_date'),
                                    'name' => 'end_date[]',
                                    'type' => 'date',
                                    'required' => false
                                ])
                            </div>
                        </div>

                        <!-- tasks -->
                        @include('front.partials.formbox', [
                            'class' => 'mb-3',
                            'label' => trans('app.tasks'),
                            'name' => 'tasks[]',
                            'required' => false,
                            'el' => 'textarea'
                        ])

                        <div class="form__box mb-4">
                            <label>
                                <input type="checkbox" name="current[]" class="mr-1"> 
                                I currently work here
                            </label>
                        </div>
                    </div>
                </div>

                <a href="" id="addBlock">+ Add another</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('resumes.create.contact') }}">
                        {{ trans('actions.back') }}
                    </a>
                </div>
                <div class="col-md-6 d-flex justify-content--end">
                    <button class="btn btn--primary" type="submit">
                        {{ trans('actions.next_education') }}
                    </button>
                </div>
            </div>

            <div class="hr"></div>

            <div>
                <p>If you don't have any experience you can skip this step</p>
                <a class="btn btn--danger mt-3" href="{{ route('resumes.create.education') }}">
                    I don't have experience
                </a>
            </div>
        </form>
    </div>
    
</section>
@endsection

@section('scripts')
<script>
    let btn = document.querySelector('#addBlock')
    btn.addEventListener('click', e => {
        e.preventDefault()

        let block = document.querySelector('.block') 
        let blockWrapper = document.querySelector('.block-wrapper')
        let newBlock = block.cloneNode(true) 

        // Resetting input values before appeding
        newBlock.childNodes[3].childNodes[1].childNodes[1].childNodes[3].value = '' // resets job title input value
        newBlock.childNodes[3].childNodes[3].childNodes[1].childNodes[3].value = '' // resets employeer input value
        newBlock.childNodes[7].childNodes[1].childNodes[1].childNodes[3].value = '' // resets start date input value
        newBlock.childNodes[7].childNodes[3].childNodes[1].childNodes[3].value = '' // resets end date input value
        newBlock.childNodes[11].childNodes[3].innerHTML = '' // resets tasks textarea
        newBlock.childNodes[13].childNodes[1].childNodes[1].checked = false // resets currenty work here checkbox
        blockWrapper.append(newBlock)
    } )
</script>
@endsection
