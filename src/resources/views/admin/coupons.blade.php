@extends('layouts.admin')

@section('title', __('admin/coupons.titles'))

@section('buttons')
    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">{{ __('admin/coupons.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Код</th>
                <th scope="col">Использовано</th>
                <th scope="col">Действует (от / до)</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <th scope="row">{{ $coupon->id }}</th>
                    <td>{{ $coupon->code }} <small class="badge bg-info text-dark">@if($coupon->percent) -{{ (float)$coupon->discount }}% @else -{{ formatPrice($coupon->discount, 'руб') }} @endif</small></td>
                    <td>{{ $coupon->history->count() }} / {!! $coupon->count_uses ?? '&infin;' !!}</td>
                    <td>{!! $coupon->publish_start ?? '&infin;' !!} / {!! $coupon->publish_end ?? '&infin;' !!}</td>
                    <td class="text-center">{{ __('admin/coupons.status.' . $coupon->status) }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.coupons.show', $coupon) }}" title="Детали" class="btn btn-secondary"><i class="fa-solid fa-sitemap"></i></a>

                        <a href="{{ route('admin.coupons.edit', $coupon) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить купон?')">
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

{{ $coupons->links('vendor.pagination.bootstrap-5') }}

@endsection
