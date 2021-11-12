@extends('front.layouts.master')
@section('content')
<section>
    @include('front.partials.intro', ['title' => trans('app.resume_template_title'), 'text' => trans('app.resume_template_text')])


    <div class="templates mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/templates/template-1.jpg') }}" alt="">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/templates/template-2.jpg') }}" alt="">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/templates/template-3.jpg') }}" alt="">
            </div>
        </div>
    </div>

</section>
@endsection