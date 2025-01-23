@php
    $key = isset($attributes['key']) ? $attributes['key'] : null;
    $title = isset($attributes['title']) ? $attributes['title'] : null;
    $values = isset($attributes['values']) ? $attributes['values'] : [];
    $class = isset($attributes['class']) ? $attributes['class'] : '';
@endphp

@if($values)
    <div class="sort__item {{ $class }}">
        @if($title)
            <div class="sort__item-title">{!! $title !!}</div>
        @endif
 
        <div class="sort__item-prices">
            <label class="sort__item-price">
                <span>{{ $values['min']->title ?? '' }}</span>
                <input type="number" wire:model="{{ $key ?? '' }}.min" name="{{ $key ?? '' }}.min" value="{{ $values['min']->checked ?? '' }}" min="{{ $values['min']->value ?? '' }}" max="{{ $values['max']->value ?? '' }}" placeholder="{{ $values['min']->value ?? '' }}">
            </label>

            <label class="sort__item-price">
                <span>{{ $values['max']->title ?? '' }}</span>
                <input type="number" wire:model="{{ $key ?? '' }}.max" name="{{ $key ?? '' }}.max" value="{{ $values['max']->checked ?? '' }}" min="{{ $values['min']->value ?? '' }}" max="{{ $values['max']->value ?? '' }}" placeholder="{{ $values['max']->value ?? '' }}">
            </label>
        </div>
    </div>
@endif
 