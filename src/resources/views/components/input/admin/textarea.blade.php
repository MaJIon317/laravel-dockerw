@props([
    'label',
    'toltip',
    'name',
    'value',
    'placeholder',
    'required',
    'rows',
    'error',
])

<div class="mb-3">
    @isset($label)
    <label class="form-label" for="input-{{ $name ?? '' }}">
        @isset($toltip)
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $toltip }}">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>
    @endif 
    <textarea 
    {{ $attributes->class([
        'form-control',
        'is-invalid' => isset($error) && !empty($error)
    ]) }}
    @isset($name) name="{{ $name }}" @endif 
    @isset($placeholder) placeholder="{{ $placeholder }}" @endif 
    @isset($required) required @endif
    rows="{{ $rows ?? 3 }}"
    id="input-{{ $name ?? '' }}"
        readonly
        onfocus="this.removeAttribute('readonly');"
        onblur="this.setAttribute('readonly', true);"
    >{{ $value ?? '' }}</textarea>
    
    @if(isset($error) && !empty($error))
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>