@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
            @endcomponent
        </div>
        <div class="col-9">
            <h1>{{ __('messages.top.recommend') }}</h1>
            <div class="row">
                @foreach ($recommended_products as $product)
                <div class="col-3">
                    <a href="{{ route('products.show', $product) }}">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail img-recommend"  alt="{{ $product->name }}">
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="product-label mt-2">
                                {{ $product->name }}<br>
                                <label>${{ $product->price }}</label>
                            </p>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>

            <h1>{{ __('messages.top.products') }}</h1>
            <div class="row">
                @foreach ($recently_products as $recently_product)
                    <div class="col-3">
                        <a href="{{ route('products.show', $recently_product) }}">
                            @if ($recently_product->image)
                                <img src="{{ asset('storage/' . $recently_product->image ) }}" alt="{{ $recently_product->image }}" class="img-thumbnail img-products">
                            @else
                                <i class="fa-solid fa-image fa-10x text-center w-100"></i>
                            @endif
                        </a>
                        <div class="row">
                            <div class="col-12">
                                <p class="product-label mt-2">
                                    {{ $recently_product->name }}<br>
                                    <label>${{ $recently_product->price }}</label>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('products.index', ['sort' => 'id', 'direction' => 'desc']) }}" class="text-decoration-none d-flex float-end">{{ __('messages.top.more') }}</a>
        </div>
    </div>
</div>
@endsection