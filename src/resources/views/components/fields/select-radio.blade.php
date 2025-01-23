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

        @php($checked = $title)

        @foreach($values as $value)
            @if(isset($value->checked) && $value->checked)
                @php($checked = $value->title ?? $checked)
            @endif
        @endforeach
 
        <div class="sort__item-text">{!! $checked !!}</div>
        <div class="sort__item-items">
            @foreach($values as $value)
                <label class="sort__item-item">
                    <input type="radio" wire:model="{{ $key ?? '' }}" name="{{ $key ?? '' }}" value="{{ $value->value ?? '' }}" data-value="{{ $value->title ?? '' }}" @if(isset($value->checked) && $value->checked) checked @endif>
                    <span class="sort__item-input_text">{{ $value->title ?? '' }}</span>
                </label>
            @endforeach
        </div>
    </div>
@endif
 