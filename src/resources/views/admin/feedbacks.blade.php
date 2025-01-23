@extends('layouts.admin')

@section('title', __('admin/feedbacks.titles'))

@section('buttons')
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Тип</th>
                <th scope="col">Клиент</th>
                <th scope="col">E-mail</th>
                <th scope="col">Телефон</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Решение</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col">Отправлено</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                @php($user = $feedback->user ?? null)
                <tr>
                    <th scope="row">
                        <a href="{{ $feedback->senturl }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="С какой страницы отправлена форма">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </th>
                    <td>{{ $feedback->code }}</td>
                    <td>
                        @if ($user)
                            <a href="{{ route('admin.users.edit', $user) }}" target="_blank">{{ $feedback->name ? $feedback->name : ($user ? $user->name : '-') }}</a> 
                        @else
                            {{ $feedback->name ? $feedback->name : ($user ? $user->name : '-') }}
                        @endif
                    </td>
                    <td>{{ $feedback->email ? $feedback->email : ($user ? $user->email : '-') }}</td>
                    <td>{{ $feedback->phone ? $feedback->phone : ($user ? $user->phone : '-') }}</td>
                    <td>{{ $feedback->comment }}</td>
                    <td>{{ $feedback->decision }}</td>
                    <td class="text-center">{{ __('admin/feedbacks.status.' . $feedback->status) }}</td>
                    <td>{{ $feedback->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.feedbacks.destroy', $feedback) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить администратора?')">
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

{{ $feedbacks->links('vendor.pagination.bootstrap-5') }}

@endsection
