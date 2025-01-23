@props([
    'name',
    'label',
    'toltip',
    'default',
    'required',
    'value',
    'values',
    'error',
])

<div class="mb-3">
    @isset($label)
        <label for="input-{{ $name ?? '' }}" class="form-label">
            @isset($toltip)
                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $toltip }}">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </label>
    @endif 
    <select name="{{ $name ?? '' }}"
        {{ $attributes->class([
            'form-select',
            'is-invalid' => isset($error) && !empty($error)
        ]) }}
        id="input-{{ $name ?? '' }}"
        @isset($required) required @endif
        >

        @isset($default)
            <option value="">{{ $default }}</option>
        @endif

        @isset($values)
            @foreach($values as $values_v => $values_n)
                <option value="{{ $values_v }}" @if(@isset($value) && $values_v == $value) selected @endif>{{ $values_n }}</option>
            @endforeach
        @endif
    </select>
    @if(isset($error) && !empty($error))
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>