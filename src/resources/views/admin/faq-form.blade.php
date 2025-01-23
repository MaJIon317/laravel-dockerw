@extends('layouts.admin')

@section('title', __('admin/faqs.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($faq))
        @method('PUT')
    @endif
 
    <!-- Content tab -->
    <x-input.admin.text 
        type="text"
        name="question" 
        :value="old('question') ?? $faq->question ?? null" 
        label="Вопрос" 
        placeholder="Вопрос"
        :error="$errors->first('question')" />
    
    <x-input.admin.textarea 
        type="text" 
        name="answer" 
        class="editor"
        :value="old('answer') ?? $faq->answer ?? null" 
        label="Ответ" 
        placeholder="Ответ" 
        :error="$errors->first('answer')" />

    <!-- END Content tab -->

</form>

@vite('resources/js/admin/editor.js')

@endsection
