@extends('layouts.admin')

@section('title', __('admin/informations.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($information))
        @method('PUT')
    @endif
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta данные</button>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            
            <!-- Content tab -->
            <x-input.admin.text 
                type="text"
                name="title" 
                :value="old('title') ?? $information->title ?? null" 
                label="Наименование" 
                placeholder="Наименование"
                :error="$errors->first('title')" />
            
            <x-input.admin.textarea 
                type="text" 
                name="description" 
                class="editor"
                :value="old('description') ?? $information->description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('description')" />

            <x-input.admin.checkbox 
                type="checkbox"
                name="status" 
                :value="1" 
                label="Статус" 
                placeholder="Статус" 
                :error="$errors->first('status')" 
                :checked="(old('status') || ($information->status ?? null))"
                />
 
            <!-- END Content tab -->

        </div>
        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <x-input.admin.text 
                type="text" 
                name="meta_title" 
                :value="old('meta_title') ?? $information->meta_title ?? null" 
                label="Заголовок" 
                placeholder="Заголовок" 
                toltip="Если оставить пусты, тогда заголовок будет скопирован с наименования"
                :error="$errors->first('meta_title')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_description" 
                :value="old('meta_description') ?? $information->meta_description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('meta_description')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_keywords" 
                :value="old('meta_keywords') ?? $information->meta_keywords ?? null" 
                label="Ключевые слова" 
                placeholder="Ключевые слова" 
                :error="$errors->first('meta_keywords')" />

            <!-- END Content tab -->
        </div>
    </div>

</form>

@vite('resources/js/admin/editor.js')

@endsection
