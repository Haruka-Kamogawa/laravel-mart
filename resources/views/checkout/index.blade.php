@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <h2 class="fw-bold mb-4 text-center">🛒 {{ __('messages.checkout.title') }}</h2>
                    <p class="text-muted text-center mb-4">
                        {{ __('messages.checkout.review_items') }}
                    </p>

                    {{-- products list --}}
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('messages.checkout.product') }}</th>
                                    <th class="text-center">{{ __('messages.checkout.quantity') }}</th>
                                    <th class="text-end">{{ __('messages.checkout.subtotal') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="fw-semibold">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- total price --}}
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h5 class="mb-0 fw-semibold">{{ __('messages.checkout.total') }}:</h5>
                        <h3 class="text-primary mb-0 fw-bold">${{ number_format($total, 2) }}</h3>
                    </div>

                    {{-- pay button --}}
                    <form action="{{ route('checkout.store') }}" method="POST" class="mt-4 text-center">
                        @csrf
                        <button type="submit" class="btn submit-button w-50 fs-6 shadow-sm">
                            <i class="bi bi-credit-card me-2"></i>{{ __('messages.checkout.pay_now') }}
                        </button>
                    </form>

                    {{-- back button --}}
                    <div class="text-center mt-3">
                        <a href="{{ route('cart.index') }}" class="text-decoration-none text-secondary small">
                            {{ __('messages.checkout.back_to_cart') }}
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection