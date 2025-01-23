@extends('layouts.admin')

@section('title', __('admin/categories.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($category))
        @method('PUT')
    @endif
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta данные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="filters-tab" data-bs-toggle="tab" data-bs-target="#filters" type="button" role="tab" aria-controls="filters" aria-selected="false">Фильтры</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="sorts-tab" data-bs-toggle="tab" data-bs-target="#sorts" type="button" role="tab" aria-controls="sorts" aria-selected="false">Сортировка</button>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                
            @php

                $items = array();

                foreach($categories as $item) {
                    $items[$item->id] = $item->title;
                }

            @endphp

            <x-input.admin.select
                name="parent_id" 
                :values="$items"
                :value="old('parent_id') ?? $category->parent_id ?? null" 
                default="Выбрать категорию"
                label="Родительская категория"
                :error="$errors->first('parent_id')" />
            
            <!-- Content tab -->
            <div class="row">
                <div class="col-auto">
                    <x-input.admin.image 
                        name="icon" 
                        :value="old('icon') ?? $category->icon ?? null" 
                        path="categories"
                        label="Иконка" 
                        :error="$errors->first('icon')" />

                </div>
                <div class="col-auto">
                    <x-input.admin.image 
                        name="banner" 
                        :value="old('banner') ?? $category->banner ?? null" 
                        path="categories"
                        label="Баннер" 
                        :error="$errors->first('banner')" />
                </div>
            </div>

            <x-input.admin.text 
                type="text"
                name="title" 
                :value="old('title') ?? $category->title ?? null" 
                label="Наименование" 
                placeholder="Наименование"
                :error="$errors->first('title')" />
            
            <x-input.admin.textarea 
                type="text" 
                name="description" 
                class="editor"
                :value="old('description') ?? $category->description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('description')" />

            <!-- END Content tab -->

        </div>
        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <x-input.admin.text 
                type="text" 
                name="meta_title" 
                :value="old('meta_title') ?? $category->meta_title ?? null" 
                label="Заголовок" 
                placeholder="Заголовок" 
                toltip="Если оставить пусты, тогда заголовок будет скопирован с наименования"
                :error="$errors->first('meta_title')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_description" 
                :value="old('meta_description') ?? $category->meta_description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('meta_description')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_keywords" 
                :value="old('meta_keywords') ?? $category->meta_keywords ?? null" 
                label="Ключевые слова" 
                placeholder="Ключевые слова" 
                :error="$errors->first('meta_keywords')" />

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="filters" role="tabpanel" aria-labelledby="filters-tab">
            <!-- Content tab -->
                <div class="alert alert-info">Если не выбран ни один фильтр, тогда будет выведен список фильтров по-умолчанию на странице категории</div>

                @foreach($filters as $filter)
                    <x-input.admin.checkbox 
                        id="filters-{{ $filter->id }}"
                        name="filter_category[{{ $filter->id }}]" 
                        :value="$filter->id" 
                        placeholder="Статус" 
                        label="{{ $filter->name }}"
                        :checked="in_array($filter->id, old('filter_category') ? old('filter_category') : ($filter_category ?? null))" />
                @endforeach

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="sorts" role="tabpanel" aria-labelledby="sorts-tab">
            <!-- Content tab -->
                <div class="alert alert-info">Если не выбрана ни одна сортировка, тогда будет выведен список сортировки по-умолчанию на странице категории</div>

                @foreach(config('general.category_sorts.all') as $sort)
                    <x-input.admin.checkbox 
                        id="sorts-{{ $sort }}"
                        name="sorts[]" 
                        :value="$sort" 
                        label="{{ __('sort.' . $sort) }}" 
                        placeholder="Статус" 
                        :checked="old('sorts.' . $sort) ?? isset($category->sorts) && in_array($sort, $category->sorts) ?? null" />
                @endforeach

            <!-- END Content tab -->
        </div>

    </div>

</form>

@vite('resources/js/admin/editor.js')

@endsection
