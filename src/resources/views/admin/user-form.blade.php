@extends('layouts.admin')

@section('title', __('admin/users.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($user))
        @method('PUT')
    @endif
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            
            <!-- Content tab -->
            <x-input.admin.text 
                type="text"
                name="inn" 
                :value="old('inn') ?? $user->inn ?? null" 
                label="ИНН" 
                placeholder="ИНН (если ООО или ИП)"
                :error="$errors->first('inn')" />
            
            <x-input.admin.text 
                type="text"
                name="name" 
                :value="old('name') ?? $user->name ?? null" 
                label="ФИО" 
                placeholder="ФИО" 
                :error="$errors->first('name')" />

            <x-input.admin.text 
                type="email"
                name="email" 
                :value="old('email') ?? $user->email ?? null" 
                label="E-mail" 
                placeholder="E-mail" 
                :error="$errors->first('email')" />

            <x-input.admin.checkbox 
                type="checkbox"
                name="email_verified_at" 
                :value="1" 
                label="Верифицирован" 
                toltip="Если неактивно, то клиенту понадобится подветрдить E-mail по ссылке в письме" 
                :error="$errors->first('email_verified_at')" 
                :checked="(old('email_verified_at') || ($user->email_verified_at ?? null))"
                />

            <x-input.admin.text 
                type="text"
                name="phone" 
                :value="old('phone') ?? $user->phone ?? null" 
                label="Телефон" 
                placeholder="Телефон" 
                :error="$errors->first('phone')" />

            <x-input.admin.text 
                type="text"
                name="city" 
                :value="old('city') ?? $user->city ?? null" 
                label="Город" 
                placeholder="Город" 
                :error="$errors->first('city')" />

            <x-input.admin.text 
                type="text"
                name="address" 
                :value="old('address') ?? $user->address ?? null" 
                label="Адрес" 
                placeholder="Адрес" 
                :error="$errors->first('address')" />

            <x-input.admin.checkbox 
                type="checkbox"
                name="send_welcome" 
                :value="1" 
                label="Не отправлять приветсвенное письмо" 
                toltip="Если активировать, то клиенту не будет отправлено приветсвенное письмо" 
                :error="$errors->first('send_welcome')" 
                :checked="(old('send_welcome') || ($user->send_welcome ?? null))"
                />

            <x-input.admin.text 
                type="password"
                name="password"
                label="Пароль" 
                placeholder="Пароль" 
                toltip="Указывать, только при создании нового пользователя и смене пароля"
                :error="$errors->first('password')" />
 
            <!-- END Content tab -->

        </div>
       
    </div>

</form>

@endsection
