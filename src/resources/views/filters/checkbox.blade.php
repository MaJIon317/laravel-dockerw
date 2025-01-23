@if($filter->hasValues())
<div class="sort__item">
    <div class="sort__item-title">{!! $filter->label() !!}</div>
    <div class="sort__item-text">
        @php
            $text = null;

            foreach($filter->values() as $value) {
                if ($filter->requestValue() && (is_array($filter->requestValue()) ? in_array($value['value'], $filter->requestValue()) : $value['value'] == $filter->requestValue())) {
                    $text[] = $value['label'];
                }
            }
        @endphp

        {!! implode(', ', $text ?? ['Выбрать']) !!}
    </div>
    <div class="sort__item-items">
        @foreach($filter->values() as $value)
            <label class="sort__item-item" for="{{ $filter->id($value['value']) }}">
                <input 
                    id="{{ $filter->id($value['value']) }}"
                    wire:model.blur="{{ $filter->name() }}"
                    name="{{ $filter->name() }}[]"
                    value="{{ $value['value'] }}"
                    type="checkbox"
                    @checked($filter->requestValue() && (is_array($filter->requestValue()) ? in_array($value['value'], $filter->requestValue()) : $value['value'] == $filter->requestValue()))
                    data-value="{{ $value['label'] }}"
                >
                <span class="sort__item-input_text">{{ $value['label'] }}</span>
            </label>
        @endforeach
    </div>
</div>

@else
cheoc
@endif
