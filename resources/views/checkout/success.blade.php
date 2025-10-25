@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-success">🎉 {{ __('messages.success.title') }}</h1>
    <p class="mt-3">{{ __('messages.success.thank_you') }}</p>

    @if(isset($order))
        <div class="card mx-auto mt-4" style="max-width: 500px;">
            <div class="card-body">
                <h4 class="card-title mb-2">{{ __('messages.success.order_summary') }}</h4>
                <hr>
                <p><strong>{{ __('messages.success.order_number') }}:</strong> {{ $order->order_number }}</p>
                <p><strong>{{ __('messages.success.total') }}:</strong> ${{ number_format($order->total, 2) }}</p>
                <p><strong>{{ __('messages.success.status') }}:</strong> {{ ucfirst($order->status) }}</p>
            </div>
        </div>
    @endif

    <a href="{{ route('products.index') }}" class="btn submit-button mt-4">{{ __('messages.success.continue_shopping') }}</a>
</div>
@endsection