<div class="hero">
  <h1 class="hero__title">
      {{ trans('app.hero_title') }}
  </h1>
  <p class="hero__text">
      {{ trans('app.hero_text') }}
  </p>

  <a href="{{ route('resumes.create.template') }}" class="btn btn--primary">
      {{ trans('actions.create_my_resume') }}
  </a>
  
  <div class="hero__img">
      <img src="{{ asset('img/hero.svg') }}" alt="">
  </div>
</div>