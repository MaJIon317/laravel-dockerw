@extends('layouts.admin')

@section('title', __('Sending an email :name', ['name' => $emailConstructor->name]))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<fieldset>
    
    <livewire:admin.email-constructor-recipients key="{{ now() }}1" :$emailConstructor />
    <hr>
    <h2 class="mt-4">{{ __('Statistics') }}</h2>
    <div class="row mb-5">
        <div class="col col-sm-8">
            <livewire:admin.email-constructor-stats key="{{ now() }}2" :$emailConstructor />
        </div>

        <div class="col col-sm-4">
            <livewire:admin.email-constructor-click-map key="{{ now() }}3" :$emailConstructor />
        </div>
    </div>
  
@endsection

