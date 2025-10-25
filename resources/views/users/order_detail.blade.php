@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span>
                <a href="{{ route('mypage') }}">{{ __('messages.mypage.title') }}</a> > <a href="{{ route('mypage.orders') }}">{{ __('messages.order_history.title') }}</a> > {{ __('messages.order_detail.title') }}
            </span>

            <h2 class="mt-4">{{ __('messages.order_detail.title_sub') }}</h2>
            <hr>

            <div class="row mb-4">
                <div class="col-5 mt-2">
                    {{ __('messages.order_detail.order_number') }}
                </div>
                <div class="col-7 mt-2">
                    {{ $order->order_number }}
                </div>

                <div class="col-5 mt-2">
                    {{ __('messages.order_detail.ordered_at') }}
                </div>
                <div class="col-7 mt-2">
                    {{ $order->created_at->format('Y-m-d H:i') }}
                </div>

                <div class="col-5 mt-2">
                    {{ __('messages.order_detail.total') }}
                </div>
                <div class="col-7 mt-2">
                    ${{ $order->total }}
                </div>

                <div class="col-5 mt-2">
                    {{ __('messages.order_detail.total_items') }}
                </div>
                <div class="col-7 mt-2">
                    {{ $order->items->sum('quantity') }}
                </div>
            </div>

            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.order_detail.product') }}</th>
                        <th>{{ __('messages.order_detail.price') }}</th>
                        <th>{{ __('messages.order_detail.quantity') }}</th>
                        <th>{{ __('messages.order_detail.subtotal') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? __('messages.mypage.order_detail.deleted_product') }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('mypage.orders') }}" class="btn btn-outline-secondary float-end mt-3">{{ __('messages.order_detail.back_to_history') }}</a>
        </div>
    </div>
</div>
@endsection