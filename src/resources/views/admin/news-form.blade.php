@extends('layouts.admin')

@section('title', __('admin/news.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($news))
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
            <div class="row">
                <div class="col-auto">
                    <x-input.admin.image 
                        name="image" 
                        :value="old('image') ?? $news->image ?? null" 
                        path="news"
                        label="Изображение" 
                        :error="$errors->first('image')" />

                </div>
                <div class="col-auto">
                    <x-input.admin.image 
                        name="banner" 
                        :value="old('banner') ?? $news->banner ?? null" 
                        path="news"
                        label="Баннер" 
                        :error="$errors->first('banner')" />
                </div>
            </div>

            <x-input.admin.text 
                type="text"
                name="title" 
                :value="old('title') ?? $news->title ?? null" 
                label="Наименование" 
                placeholder="Наименование"
                :error="$errors->first('title')" />
            
            <x-input.admin.textarea 
                type="text" 
                name="description" 
                class="editor"
                :value="old('description') ?? $news->description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('description')" />

            <x-input.admin.text 
                type="datetime-local"
                name="publish_date" 
                :value="old('publish_date') ?? $news->publish_date ?? null" 
                label="Опубликовать" 
                placeholder="Опубликовать" 
                toltip="Вы можете указать дату и время, когда отобразить статью пользователям" 
                :error="$errors->first('publish_date')" />

            <x-input.admin.checkbox 
                type="checkbox"
                name="status" 
                :value="1" 
                label="Статус" 
                placeholder="Статус" 
                :error="$errors->first('status')" 
                :checked="(old('status') || ($news->status ?? null))"
                />
 
            <!-- END Content tab -->

        </div>
        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <x-input.admin.text 
                type="text" 
                name="meta_title" 
                :value="old('meta_title') ?? $news->meta_title ?? null" 
                label="Заголовок" 
                placeholder="Заголовок" 
                toltip="Если оставить пусты, тогда заголовок будет скопирован с наименования"
                :error="$errors->first('meta_title')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_description" 
                :value="old('meta_description') ?? $news->meta_description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('meta_description')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_keywords" 
                :value="old('meta_keywords') ?? $news->meta_keywords ?? null" 
                label="Ключевые слова" 
                placeholder="Ключевые слова" 
                :error="$errors->first('meta_keywords')" />

            <!-- END Content tab -->
        </div>
    </div>

</form>

@vite('resources/js/admin/editor.js')

@endsection
