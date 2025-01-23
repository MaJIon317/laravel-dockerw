@extends('layouts.admin')

@section('title', __('admin/orders.titles'))
{{--
@section('buttons')
    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">{{ __('admin/orders.add') }}</a>
@endsection
--}}
 
@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Клиент</th>
                <th scope="col">Сумма</th>
                <th scope="col">Оплата</th>
                <th scope="col">Оплаченный</th>
                <th scope="col">Доставка</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата заказа</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td scope="row">{{ $order->user->name }}</td>
                    <td scope="row">{{ formatPrice($order->total, 'руб') }}</td>
                    <td scope="row">{{ __('order.payment.' . $order->payment) }}</td>
                    <td scope="row">{{ __('order.paid.' . $order->is_paid) }}</td>
                    <td scope="row">{{ __('order.delivery.' . $order->delivery) }}</td>
                    <td scope="row">
                        <span class="statustext statustext--{{ $order->status }}">{{ __('order.status.' . $order->status) }}</span>
                    </td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.orders.show', $order) }}" title="Детали" class="btn btn-primary"><i class="fa-regular fa-eye"></i></a>

                        <a href="{{ route('admin.orders.edit', $order) }}" title="Редактировать" class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить купон?')">
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

{{ $orders->links('vendor.pagination.bootstrap-5') }}


<style>
    .statustext {
        position: relative
    }

    .statustext--new {
        color: var(--body-color-bold)
    }

    .statustext--processing {
        color: #f79e1b
    }

    .statustext--delivery {
        color: #3034ff
    }

    .statustext--delivered {
        color: #000294
    }

    .statustext--completed {
        color: #03af03
    }

    .statustext--cancelled {
        color: red
    }
</style>
@endsection
