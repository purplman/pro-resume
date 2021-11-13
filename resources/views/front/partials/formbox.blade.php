<div class="form__box {{ $class ?? '' }}">
    <label class="form__label">
        {{ $label }}
        @if ($required)
            @include('front.partials.required')
        @endif
    </label>
    @if (isset($el))
        <textarea 
        class="form__el" 
        name="{{ $name }}" 
        rows="10"
        {{ $required ? 'required' : '' }}></textarea>
    @else
        <input 
            class="form__el" 
            type="{{ $type ?? 'text' }}" 
            value="{{ $value ?? '' }}" 
            name="{{ $name }}" 
            placeholder="{{ $placeholder ?? '' }}"
            {{ $required ? 'required' : '' }}
        >
    @endif    
</div>