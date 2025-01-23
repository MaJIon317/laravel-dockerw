@extends('layouts.admin')

@section('title', __('admin/admin-roles.titles'))

@section('buttons')
    <a href="{{ route('admin.admin-roles.create') }}" class="btn btn-primary">{{ __('admin/admin-roles.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование роли</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($adminRoles as $adminRole)
                <tr>
                    <th scope="row">{{ $adminRole->id }}</th>
                    <td>{{ $adminRole->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.admin-roles.edit', $adminRole) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                 
                        <form action="{{ route('admin.admin-roles.destroy', $adminRole) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить группу пользователей?')">
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

{{ $adminRoles->links('vendor.pagination.bootstrap-5') }}

@endsection
