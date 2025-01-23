@extends('layouts.admin')

@section('title', __('admin/users.titles'))

@section('buttons')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ __('admin/users.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle" id="table-default">
        <thead>
            <tr>
                <th scope="col" style="width: 1px">#</th>
                <th scope="col" style="min-width: 110px;">ФИО</th>
                <th scope="col">E-mail</th>
                <th scope="col">Телефон</th>
                <th scope="col" class="text-center">Верификация</th>
                <th scope="col" width="110"></th>
            </tr>
           
            <tr id="filter" data-route="{{ route(\Request::route()->getName()) }}">
                <th scope="col">#</th>
                <th scope="col" style="min-width: 110px;">
                    <input type="text" name="name" value="{{ request()->input('name') }}" class="form-control">
                </th>
                <th scope="col">
                    <input type="text" name="email" value="{{ request()->input('email') }}" class="form-control">
                </th>
                <th scope="col">
                    <input type="text" name="phone" value="{{ request()->input('phone') }}" class="form-control">
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td scope="row">{{ $user->name }}</td>
                    <td scope="row">{{ $user->email }}</td>
                    <td scope="row">{{ $user->phone }}</td>
                    <td scope="row" class="text-center">{{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->diffForHumans() : '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.users.edit', $user) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить пользователя?')">
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

<div class="paginationp">
    {{ $users->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection
