@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center py-4">
    <div class="w-75">
        <h2 class="mb-4">{{ __('messages.favorites.title') }}</h2>

        

        @if ($favorite_products->isEmpty())
            <div class="text-center py-5">
                <p class="fs-5 text-muted">{{ __('messages.favorites.empty_list') }}</p>
            </div>
        @else
            @foreach ($favorite_products as $favorite_product)
                <hr>

                <div class="row align-items-center">
                    <div class="col-2 mt-2">
                        <a href="{{ route('products.show', $favorite_product->id) }}" class="w-25">
                            @if ($favorite_product->image)
                                <img src="{{ asset('storage/' . $favorite_product->image ) }}" alt="{{ $favorite_product->image }}" class="w-100 img-thumbnail favorite-img">
                            @else
                                <i class="fa-solid fa-image fa-10x text-center w-100"></i>
                            @endif
                        </a>
                    </div>
                    <div class="col-7 mt-2">
                        <a href="{{ route('products.show', $favorite_product->id) }}" class="w-25 text-dark">
                            <h5 class="w-100 favorite-item-text">
                                {{ $favorite_product->name }}
                            </h5>
                        </a>
                        <h6 class="w-100 favorite-item-text">${{ $favorite_product->price }}</h6>
                    </div>
                    <div class="col-1">
                        <a href="{{ route('favorites.destroy', $favorite_product->id) }}" class="favorite-delete text-decoration-none text-danger" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form{{$favorite_product->id}}').submit();">
                            {{ __('messages.favorites.remove') }}
                        </a>
                        <form id="favorites-destroy-form{{$favorite_product->id}}" action="{{ route('favorites.destroy', $favorite_product->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    <div class="col-2">
                        <form method="POST" action="{{ route('cart.add', $favorite_product->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $favorite_product->id }}">
                            <input type="hidden" name="name" value="{{ $favorite_product->name }}">
                            <input type="hidden" name="price" value="{{ $favorite_product->price }}">
                            <input type="hidden" name="image" value="{{ $favorite_product->image }}">
                            <input type="hidden" name="carriage" value="{{ $favorite_product->carriage_flag }}">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="weight" value="0">
                            <button type="submit" class="btn submit-button">
                                <i class="fas fa-shopping-cart"></i> {{ __('messages.favorites.add_to_cart') }}
                            </button>
                        </form>
                    </div>
                    
                </div>

                <hr>
            @endforeach
        @endif
        
    </div>
</div>
@endsection