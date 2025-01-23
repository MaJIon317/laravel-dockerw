@extends('layouts.admin')

@section('title', __('admin/holidays.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($holiday))
        @method('PUT')
    @endif
    
    <!-- Content tab -->
    <x-input.admin.text 
        type="text"
        name="title" 
        :value="old('title') ?? $holiday->title ?? null" 
        label="Наименование" 
        placeholder="Наименование"
        :error="$errors->first('title')" />
    
    <div class="row">
        <div class="col-auto">
            <x-input.admin.image 
                name="image" 
                :value="old('image') ?? $holiday->image ?? null" 
                path="holidays"
                label="Изображение" 
                :error="$errors->first('image')" />
        </div>
    </div>

        @php

            $items = array();

            foreach($categories as $item) {
                $items[$item->id] = $item->title;
            }

        @endphp

        <x-input.admin.select
            name="category_id" 
            :values="$items"
            :value="old('category_id') ?? $holiday->category_id ?? null" 
            default="Выбрать категорию"
            label="Категория"
            :error="$errors->first('category_id')" />
    
        @php

            $items = array(
                1 => 'Январь',
                2 => 'Февраль',
                3 => 'Март',
                4 => 'Апрель',
                5 => 'Май',
                6 => 'Июнь',
                7 => 'Июль',
                8 => 'Август',
                9 => 'Сентябрь',
                10 => 'Октябрь',
                11 => 'Ноябрь',
                12 => 'Декабрь'
            );

        @endphp

    <x-input.admin.select
        name="month" 
        :values="$items"
        :value="old('month') ?? $holiday->month ?? null" 
        label="Месяц"
        :error="$errors->first('month')" />

    @php

        $items = array();

        for($i = 1; $i <= 31; $i += 1) {
            $items[$i] = $i;
        }

    @endphp

    <x-input.admin.select
        name="day" 
        :values="$items"
        :value="old('day') ?? $holiday->day ?? null" 
        label="День"
        :error="$errors->first('day')" />

</form>

@endsection
