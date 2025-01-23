@extends('layouts.admin')

@section('title', __('admin/admin-roles.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($adminRole))
        @method('PUT')
    @endif

    <x-input.admin.text 
        type="text"
        name="name" 
        :value="old('name') ?? $adminRole->name ?? null" 
        label="Наименование" 
        placeholder="Наименование"
        :error="$errors->first('name')" />

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 form-label @if($errors->has('permission.assets')) is-invalid @endif ">Разрешён просмотр</h5>
                    @if($errors->has('permission.assets'))
                        <div class="invalid-feedback">{{ $errors->first('permission.assets') }}</div>
                    @endif
                    <div class="card-text mt-3 mb-3" style="max-height: 400px; overflow: auto;">
                        @php
                            $checkeds = (old('permission') && isset(old('permission')['assets'])) ? old('permission')['assets'] : (old('permission') ? [] : ($adminRole->permission['assets'] ?? []));
                        @endphp
                        @foreach($routes as $route)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[assets][]" value="{{ $route }}" id="input-assets-{{ $route }}"
                                    @if(in_array($route, $checkeds)) checked @endif
                                >
                                <label class="form-check-label" for="input-assets-{{ $route }}">{{ $route }}</label>
                            </div>
                        @endforeach
                    </div>
                    
                    <input type="checkbox" class="btn-check" id="btn-check-assets" autocomplete="off">
                    <label class="btn btn-primary" for="btn-check-assets">Выбрать / Снять Все</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 form-label @if($errors->has('permission.modify')) is-invalid @endif">Разрешено внесение изменений</h5>
                    @if($errors->has('permission.modify'))
                        <div class="invalid-feedback">{{ $errors->first('permission.modify') }}</div>
                    @endif
                    <div class="card-text mt-3 mb-3" style="max-height: 400px; overflow: auto;">
                        @php
                            $checkeds = (old('permission') && isset(old('permission')['modify'])) ? old('permission')['modify'] : (old('permission') ? [] : ($adminRole->permission['modify'] ?? []));
                        @endphp
                        @foreach($routes as $route)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[modify][]" value="{{ $route }}" id="input-modify-{{ $route }}"
                                    @if(in_array($route, $checkeds)) checked @endif
                                >
                                <label class="form-check-label" for="input-modify-{{ $route }}">{{ $route }}</label>
                            </div>
                        @endforeach
                    </div>
                    
                    <input type="checkbox" class="btn-check" id="btn-check-modify" autocomplete="off">
                    <label class="btn btn-primary" for="btn-check-modify">Выбрать / Снять Все</label>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const elements = document.querySelectorAll('.btn-check')

    elements.forEach(element => {
        element.addEventListener('click', event => {
            var inputs = element.previousElementSibling.querySelectorAll('input[type="checkbox"]')

            Array.prototype.forEach.call(inputs, function(cb) {
                cb.checked = event.target.checked;
            });
        })
    });
</script>
@endsection
