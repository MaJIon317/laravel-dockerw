@extends('layouts.admin')

@section('title', __('admin/orders.show', ['count' => $order->id, 'created_at' => $order->created_at->diffForHumans()]))

@section('content')


<!-- Main content -->
<div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
                <small class="me-3">{{ $order->created_at }}</small>
                <small class="me-3">#{{ $order->id }}</small>
                <small class="me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Способ оплаты"><i class="fa-regular fa-credit-card"></i> {{ __('order.payment.' . $order->payment) }}</small>
                <small class="me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Способ доставки"><i class="fa-solid fa-truck"></i> {{ __('order.delivery.' . $order->delivery) }}</small>
                <small class="me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Статус заказа"><i class="fa-solid fa-flag-usa"></i> {{ __('order.status.' . $order->status) }}</small>
            </div>
            <div class="d-flex">
              <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="fa-solid fa-file-arrow-down"></i> <span class="text">Счет-фактура</span></button>
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Заказ со штрихкодами</a></li>
                  <li><a class="dropdown-item" href="#">Отсутствующие товары</a></li>
                </ul>
              </div>
            </div>
          </div>
          <table class="table table-borderless">
            <tbody>
                @foreach($order->products as $product)
              <tr>
                <td>
                  <div class="d-flex mb-2">
                    <div class="flex-shrink-0">
                      <img src="{{ resize(Arr::first($product->product->images), 35, 35) }}" alt="." width="35" class="img-fluid">
                    </div>
                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="{{ route('product', $product->product->slug) }}" target="_blank" class="text-reset">{{ $product->product->title }}</a></h6>
                      {{--<span class="small">Color: Black</span>--}}
                    </div>
                  </div>
                </td>
                <td>{{ $product->quantity }} шт.</td>
                <td class="text-end">{{ formatPrice($product->total, 'руб') }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
                @foreach($order->totals as $total)
              <tr>
                <td colspan="2">{{ __('order.total.' . $total->code) }}</td>
                <td class="text-end">{{ formatPrice($total->value, 'руб') }}</td>
              </tr>
              @endforeach

            </tfoot>
          </table>
        </div>
      </div>
      <!-- Payment -->
      <div class="card mb-4">
        <div class="card-body">
            <h3 class="h6">История заказа</h3>

            <table class="table">
            <tbody>
                @foreach($order->history as $history)
              <tr>
                <td>{{ __('order.status.' . $history->status) }}</td>
                <td>{{ $history->created_at->diffForHumans() }}</td>
                <td>{{ $history->comment ?? '-' }}</td>
              </tr>
              @endforeach
            </tbody>
            
          </table>

        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- Customer Notes -->
       @if($order->comment)
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h5">Комментарий клиента</h3>
          <p>{{ $order->comment }}</p>
        </div>
      </div>
      @endif
      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h6">Информация о доставке</h3>
          <address><strong>{{ $order->name }}</strong><br>
            @if($order->inn) <abbr title="Телефон">ИНН:</abbr> {{ $order->inn }}<br>@endif
            <abbr title="Телефон">Тел:</abbr> {{ $order->phone }}<br>
            <abbr title="E-mail">E-mail:</abbr> {{ $order->email }}<br>
            <abbr title="Адрес">Адрес:</abbr> {{ $order->city }}, {{ $order->address }}
            <abbr title="Адрес">Способ доставки:</abbr> {{ __('order.delivery.' . $order->delivery) }}
          </address>
        </div>
      </div>
      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h6">Информация об оплате</h3>
          <p>{{ __('order.payment.' . $order->payment) }} <br>
              {{ formatPrice($order->total, 'руб') }} <span class="badge bg-{{ $order->is_paid ? 'success' : 'danger' }} rounded-pill">{{ __('order.paid_full.' . $order->is_paid) }}</span>
            </p>
        </div>
      </div>


    </div>
  </div>

 
@endsection
