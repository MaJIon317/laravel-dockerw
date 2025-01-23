@props([
    'label',
    'toltip',
    'type',
    'name',
    'value',
    'placeholder',
    'required',
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
    <input 
    {{ $attributes->class([
        'form-control',
        'is-invalid' => isset($error) && !empty($error)
    ]) }}
    @isset($type) type="{{ $type }}" @endif 
    @isset($name) name="{{ $name }}" @endif 
    value="{{ $value ?? '' }}" 
    @isset($placeholder) placeholder="{{ $placeholder }}" @endif 
    @isset($required) required @endif
    id="input-{{ $name ?? '' }}"
    autocomplete="off"
        readonly
        onfocus="this.removeAttribute('readonly');"
        onblur="this.setAttribute('readonly', true);"
    >

    @if(isset($error) && !empty($error))
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>

