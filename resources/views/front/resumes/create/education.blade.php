@extends('front.layouts.master')

@section('title', 'Education - ' . env('APP_NAME'))

@section('content')
<section class="mt-5">
    
    @include('front.partials.intro', ['title' => trans('app.resume_education_title'), 'text' => trans('app.resume_education_text')])

        {{-- list templates here --}}

    <div id="contact-form" class="resume__contact">
        <form action="{{ route('resumes.education') }}" method="post" class="form">
        @csrf
        <div class="resume__education__form mt-5 mb-3">

            <div class="block-wrapper">
                <div class="block">
                    <!-- school name & degree -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            @include('front.partials.formbox', [
                                'label' => trans('app.school_name'),
                                'name' => 'school_name[]',
                                'required' => true,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('front.partials.formbox', [
                                'label' => trans('app.degree'),
                                'name' => 'degree[]',
                                'required' => false,
                            ])
                        </div>
                    </div>

                    <!-- field -->
                    @include('front.partials.formbox', [
                        'class' => 'mb-3',
                        'label' => trans('app.field'),
                        'name' => 'field[]',
                        'required' => false,
                    ])
                    

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

                    <div class="form__box mb-4">
                        <label>
                            <input type="checkbox" name="current[]" class="mr-1"> 
                            I currently attend here
                        </label>
                    </div>
                </div>
            </div>      

            <a href="" id="addBlock">+ Add another</a>

        </div>

        
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('resumes.create.experience') }}">
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

@section('scripts')
<script>
    let btn = document.querySelector('#addBlock')
    btn.addEventListener('click', e => {
        e.preventDefault()

        let block = document.querySelector('.block') 
        let blockWrapper = document.querySelector('.block-wrapper')
        let newBlock = block.cloneNode(true) 

        // Resetting input values before appeding
        newBlock.childNodes[3].childNodes[1].childNodes[1].childNodes[3].value = '' // resets school name input value
        newBlock.childNodes[3].childNodes[3].childNodes[1].childNodes[3].value = '' // resets degree input value
        newBlock.childNodes[7].childNodes[3].value = '' // resets field input value
        newBlock.childNodes[11].childNodes[1].childNodes[1].childNodes[3].value = '' // resets start date input value
        newBlock.childNodes[11].childNodes[3].childNodes[1].childNodes[3].value = '' // resets start date input value
        newBlock.childNodes[13].childNodes[1].childNodes[1].checked = false // resets currenty attend here checkbox
        blockWrapper.append(newBlock) 
    } )
</script>
@endsection