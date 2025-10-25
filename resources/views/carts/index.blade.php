@extends('layouts.app')

@section('content')
<div class="container py-4 d-flex justify-content-center">
    <div class="w-75">
        <h2 class="mb-4">{{ __('messages.cart.title') }}</h2>

        {{-- messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ __('messages.cart.success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ __('messages.cart.error') }}</div>
        @endif

        @if($items->count())
            <div class="shadow-sm border-0">
                <div class="">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('messages.cart.product') }}</th>
                                <th>{{ __('messages.cart.price') }}</th>
                                <th>{{ __('messages.cart.quantity') }}</th>
                                <th>{{ __('messages.cart.total') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        @if($item->attributes->image)
                                            <a href="{{ route('products.show', $item->id) }}" class="">
                                                <img src="{{ asset('storage/' . $item->attributes->image) }}" class="img-thumbnail me-3" style="width:70px; height:70px; object-fit:cover;">
                                            </a>
                                        @endif
                                        <a href="{{ route('products.show', $item->id) }}" class="text-dark">
                                            <span>
                                                {{ $item->name }}
                                            </span>
                                        </a>
                                    </td>
                                    <td>${{ number_format($item->price) }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                                   class="form-control form-control-sm text-center" style="width:70px;">
                                            <button class="btn btn-sm btn-outline-secondary ms-2">{{ __('messages.cart.update') }}</button>
                                        </form>
                                    </td>
                                    <td>${{ number_format($item->price * $item->quantity) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-none text-danger btn-sm">{{ __('messages.cart.remove') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- total price --}}
            <div class="d-flex justify-content-end mt-4">
                <div class="border rounded p-3 bg-light text-end" style="min-width: 260px;">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">{{ __('messages.cart.total_label') }}</h5>
                        <h5 class="mb-0">${{ number_format($total) }}</h5>
                    </div>
                    <small class="text-muted">{{ __('messages.cart.tax') }}</small>
                </div>
            </div>

            {{-- button --}}
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary me-3">
                    {{ __('messages.cart.continue_shopping') }}
                </a>

                @if ($total > 0)
                    <button type="button" class="btn submit-button" data-bs-toggle="modal" data-bs-target="#buy-confirm-modal">
                        {{ __('messages.cart.confirm_purchase') }}
                    </button>
                @else
                    <button type="button" class="btn submit-button disabled">
                        {{ __('messages.cart.confirm_purchase') }}
                    </button>
                @endif
            </div>

            {{-- modals --}}
            <div class="modal fade" id="buy-confirm-modal" tabindex="-1" aria-labelledby="confirmPurchaseLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmPurchaseLabel">{{ __('messages.cart.modal_title') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            {{ __('messages.cart.modal_body') }}
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('messages.cart.cancel') }}</button>
                            <a href="{{ route('checkout.index') }}" class="btn submit-button">{{ __('messages.cart.purchase') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <div class="text-center py-5">
                <p class="fs-5 text-muted">{{ __('messages.cart.empty_cart') }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary mt-3">{{ __('messages.cart.browse_products') }}</a>
            </div>
        @endif
    </div>
</div>
@endsection