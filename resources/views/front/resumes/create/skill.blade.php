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

                <div class="skill-wrapper">
                    <div class="skill-block">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                @include('front.partials.formbox', [
                                    'label' => trans('app.skill'),
                                    'name' => 'names[]',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md-6">
                                <div class="form__box">
                                    <label class="form__label">
                                        {{ trans('app.level') }}
                                    </label>
                                    <select class="form__el"  name="levels[]">
                                        <option value="">Select a level</option>
                                        <option value="1">Trainee</option>
                                        <option value="2">Novice</option>
                                        <option value="3">Proficent</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="" id="addSkill">Add another</a>
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

@section('scripts')
    <script>
        let btn = document.querySelector('#addSkill')
        btn.addEventListener('click', e => {
            e.preventDefault()
            let skillBlock = document.querySelector('.skill-block')
            let skillWrapper = document.querySelector('.skill-wrapper')
            let newSkillBlock = skillBlock.cloneNode(true)
            newSkillBlock.childNodes[1].childNodes[1].childNodes[1].childNodes[3].value = '' // this dives deep into the skill block element to find the damn input element and reset its value -_-
            newSkillBlock.childNodes[1].childNodes[3].childNodes[1].childNodes[3].value = '' // and this one does the same thing for resetting value of the select element
            skillWrapper.append(newSkillBlock)
        } )
    </script>
@endsection