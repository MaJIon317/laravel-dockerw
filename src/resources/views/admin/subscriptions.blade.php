@extends('layouts.admin')

@section('title', __('admin/subscriptions.titles'))

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">E-mail</th>
                <th scope="col">Подписан</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $subscription)
                <tr>
                    <th scope="row">{{ $subscription->id }}</th>
                    <td>{{ $subscription->email }}</td>
                    <td>{{ $subscription->created_at->diffForHumans() }}</td>
                    <td class="text-center">{{ __('admin/subscriptions.status.' . $subscription->status) }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.subscriptions.destroy', $subscription) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите выполнить удаление?')">
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

{{ $subscriptions->links('vendor.pagination.bootstrap-5') }}

@endsection
