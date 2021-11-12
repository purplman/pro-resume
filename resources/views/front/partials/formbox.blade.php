<div class="form__box {{ $class ?? '' }}">
    <label class="form__label">
        {{ $label }}
        @include('front.partials.required')
    </label>
    <input 
        class="form__el" 
        type="{{ $type ?? 'text' }}" 
        value="{{ $value ?? '' }}" 
        name="{{ $name }}" 
        placeholder="{{ $placeholder ?? '' }}"
        {{ $required ? 'required' : '' }}
    >
</div>