@props([
    'label',
    'toltip',
    'name',
    'value',
    'path',
    'required',
    'error',
])

<div class="mb-3">
    @isset($label)
    <div class="form-label d-flex justify-content-between">
        @isset($toltip)
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $toltip }}">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
        @if(isset($error) && !empty($error))
        <div class="position-relative d-flex">
            <div class="is-invalid"></div>
            <div class="invalid-feedback d-flex align-items-center m-0" data-bs-toggle="tooltip" data-bs-title="{{ $error }}"><i class="fa-solid fa-circle-question"></i></div>
        </div>
        @endif
    </div>
    @endif 
    <div class="d-flex flex-column" style="width: 100px;" data-image-upload>
        <input type="hidden" 
            name="{{ $name ?? '' }}" 
            value="{{ $value ?? '' }}"
            data-path="{{ $path ?? 'demo' }}"
            @isset($required) required @endif
            >
        <img src="{{ resize($value ?? 'no-image.png', 100, 100) }}" data-image-original="{{ resize($value ?? 'no-image.png') }}" data-placeholder="{{ resize('no-image.png', 100, 100) }}" alt="." class="img-thumbnail">
        <div class="input-group flex-nowrap mt-1">
            <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>
            <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>
        </div>
    </div>
</div>
