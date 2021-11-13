@extends('front.layouts.master')
@section('content')
<section>
    @include('front.partials.intro', ['title' => trans('app.resume_template_title'), 'text' => trans('app.resume_template_text')])


    <div class="templates mt-5">
        <div class="row">
            @foreach ($templates as $template)
            <div class="col-md-4 text--center">
                <img src="{{ asset('img/templates/template-1.jpg') }}" alt="{{ env('APP_NAME') }}">
                <form action="{{ route('resumes.template') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $template->id }}">
                    <button type="submit" class="btn btn--primary mt-3">
                        {{ trans('actions.use_this_template') }}
                    </button>
                </form>
                
            </div>
            
            @endforeach
            
        </div>
    </div>

</section>
@endsection