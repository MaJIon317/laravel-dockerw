@extends('layouts.admin')

@section('title', __('admin/coupons.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($coupon))
        @method('PUT')
    @endif
    
    <x-input.admin.text 
        type="text"
        name="code" 
        :value="old('code') ?? $coupon->code ?? null" 
        label="Код купона" 
        placeholder="Код купона"
        :error="$errors->first('code')" />
    
    <x-input.admin.checkbox 
        type="checkbox"
        name="percent" 
        :value="1" 
        label="Скидка в процентах (%)" 
        placeholder="Скидка в процентах (%)" 
        :error="$errors->first('percent')" 
        :checked="(old('percent') || ($coupon->percent ?? null))"
        />

    <x-input.admin.text 
        type="nubmer"
        name="discount" 
        :value="old('discount') ?? $coupon->discount ?? null" 
        label="Скидка" 
        placeholder="Скидка"
        :error="$errors->first('discount')" />

    <div class="row">
        <div class="col-auto">
            <x-input.admin.text 
                type="datetime-local"
                name="publish_start" 
                :value="old('publish_start') ?? $coupon->publish_start ?? null" 
                label="Действует от" 
                :error="$errors->first('publish_start')" />
        </div>
        <div class="col-auto">
            <x-input.admin.text 
                type="datetime-local"
                name="publish_end" 
                :value="old('publish_end') ?? $coupon->publish_end ?? null" 
                label="Действует до" 
                :error="$errors->first('publish_end')" />
        </div>
    </div>

    <x-input.admin.text 
        type="nubmer"
        name="count_uses" 
        :value="old('count_uses') ?? $coupon->count_uses ?? null" 
        label="Максимальное кол-во использований" 
        placeholder="Максимальное кол-во использований"
        :error="$errors->first('count_uses')" />
     
    <x-input.admin.checkbox 
        type="checkbox"
        name="status" 
        :value="1" 
        label="Статус" 
        placeholder="Статус" 
        :error="$errors->first('status')" 
        :checked="(old('status') || ($coupon->status ?? null))"
        />
 
</form>

@endsection