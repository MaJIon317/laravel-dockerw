@extends('layouts.admin')

@section('title', __('admin/admins.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($admin))
        @method('PUT')
    @endif

    @php

        $items = array();

        foreach($roles as $role) {
            $items[$role->id] = $role->name;
        }

    @endphp

    <x-input.admin.select
        name="admin_role_id" 
        :values="$items"
        :value="old('admin_role_id') ?? $admin->admin_role_id ?? null" 
        label="Роль"
        :error="$errors->first('admin_role_id')" />

    <x-input.admin.text 
        type="text"
        name="name" 
        :value="old('name') ?? $admin->name ?? null" 
        label="ФИО" 
        placeholder="ФИО"
        :error="$errors->first('name')" />
    
    <x-input.admin.text 
        type="email"
        name="email" 
        :value="old('email') ?? $admin->email ?? null" 
        label="E-mail" 
        placeholder="E-mail"
        :error="$errors->first('email')" />
 
    <x-input.admin.text 
        type="password"
        name="password"
        label="Пароль" 
        placeholder="Пароль" 
        toltip="Указывать, только при создании нового администратора и смене пароля"
        :error="$errors->first('password')" />

</form>

@endsection
