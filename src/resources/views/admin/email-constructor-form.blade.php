@extends('layouts.admin')

@section('title', __('admin/email-constructors.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($emailConstructor))
        @method('PUT')
    @endif
    
    <x-input.admin.text 
        type="text"
        name="name" 
        :value="old('name') ?? $emailConstructor->name ?? null" 
        label="Название" 
        placeholder="Название"
        toltip="Отображается только в административной панели"
        :error="$errors->first('name')" />

    <x-input.admin.text 
        type="text"
        name="subject" 
        :value="old('subject') ?? $emailConstructor->subject ?? null" 
        label="Заголовок письма" 
        placeholder="Заголовок письма"
        :error="$errors->first('subject')" />
        
    <x-input.admin.textarea 
        name="text" 
        :value="old('text') ?? $emailConstructor->text ?? null" 
        label="Текстовое содержимое письма" 
        placeholder="Введите текст"
        toltip="Отображается где недоступен HTML"
        :error="$errors->first('text')" />

    <x-input.admin.text 
        type="text"
        name="tags" 
        :value="old('tags') ?? $emailConstructor->tags ?? null" 
        label="Теги" 
        placeholder="Теги"
        toltip="Указывать через запятую"
        :error="$errors->first('tags')" />
        
    <x-input.admin.textarea 
        name="html" 
        id="input-html"
        :value="old('html') ?? $emailConstructor->html ?? null" 
        :error="$errors->first('html')"
        class="d-none" />

    <x-input.admin.textarea 
        name="json" 
        id="input-json"
        :value="old('json') ?? $emailConstructor->json ?? null"
        :error="$errors->first('json')"
        class="d-none" />
 
</form>

<fieldset>
    <legend>HTML содержимое письма</legend>

    @if(!config('settings.unlayer_project_id') || !config('settings.unlayer_template_id'))
        <div class="alert alert-danger">В общих <a href="{{ route('admin.settings.index') }}#unlayer-tab" target="_blank">настройках</a> во вкладке <strong>unlayer.com</strong> производите настройки</div>
    @else
        <div id="editor-container" class="form-control" data-projectId="{{ config('settings.unlayer_project_id') }}" data-templateId="{{ config('settings.unlayer_template_id') }}" data-mergeTags="{{ json_encode(config('email_constructor.merge_tags'), true) }}"></div>
    @endif
</fieldset>

@endsection
