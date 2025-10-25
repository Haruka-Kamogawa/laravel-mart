@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span>
                <a href="{{ route('mypage') }}">{{ __('messages.mypage.title') }}</a> > {{ __('messages.order_history.title') }}
            </span>
            <h2 class="mt-4">{{ __('messages.order_history.title') }}</h2>
            <hr>

            @if($orders->isEmpty())
                <p>{{ __('messages.order_history.no_orders') }}</p>
            @else
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>{{ __('messages.order_history.order_number') }}</th>
                            <th>{{ __('messages.order_history.ordered_at') }}</th>
                            <th>{{ __('messages.order_history.total') }}</th>
                            <th>{{ __('messages.order_history.status') }}</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td><a href="{{ route('mypage.order_detail', $order->id) }}" class="btn text-primary btn-sm">{{ __('messages.order_history.view_details') }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection