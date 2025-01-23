@extends('layouts.admin')

@section('title', __('admin/admins.titles'))

@section('buttons')
    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">{{ __('admin/admins.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Роль</th>
                <th scope="col">ФИО</th>
                <th scope="col">E-mail</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th scope="row">{{ $admin->id }}</th>
                    <td>{{ $admin->role->name }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.admins.edit', $admin) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить администратора?')">
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

{{ $admins->links('vendor.pagination.bootstrap-5') }}

@endsection
