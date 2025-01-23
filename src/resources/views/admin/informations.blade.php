@extends('layouts.admin')

@section('title', __('admin/informations.titles'))

@section('buttons')
    <a href="{{ route('admin.informations.create') }}" class="btn btn-primary">{{ __('admin/informations.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($informations as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->title }}</td>
                    <td class="text-center">{{ __('admin/informations.status.' . $information->status) }}</td>
                    <td class="text-end">
                        <a href="{{ route('information', $information->slug) }}" title="Детали" class="btn btn-secondary" target="_blank"><i class="fa-regular fa-eye"></i></a>

                        <a href="{{ route('admin.informations.edit', $information) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.informations.destroy', $information) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите выполнить удаление?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $informations->links('vendor.pagination.bootstrap-5') }}

@endsection
