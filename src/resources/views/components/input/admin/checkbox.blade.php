@props([
    'id',
    'label',
    'toltip',
    'name',
    'value',
    'placeholder',
    'required',
    'checked',
    'error',
])

<div class="mb-3 form-check form-switch">
    <input 
    {{ $attributes->class([
        'form-check-input',
        'is-invalid' => isset($error) && !empty($error)
    ]) }}
    type="checkbox"
    @isset($name) name="{{ $name }}" @endif 
    value="{{ $value ?? '' }}" 
    @isset($placeholder) placeholder="{{ $placeholder }}" @endif 
    @isset($required) required @endif
    @if(isset($checked) && $checked) checked @endif
    @isset($id) id="{{ $id }}" @else id="input-{{ $name ?? '' }}" @endif
    >

    @isset($label)
    <label class="form-check-label" @isset($id) for="{{ $id }}" @else for="input-{{ $name ?? '' }}" @endif>
        @isset($toltip)
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $toltip }}">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>
    @endif 

    @if(isset($error) && !empty($error))
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>

