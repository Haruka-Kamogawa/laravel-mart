@extends('layouts.app')

@section('content')
<div class="container py-4">
   <div class="row justify-content-center">

      {{-- Product img --}}
      <div class="col-md-10">
         <div class="card shadow-sm">
            <div class="row g-0 align-items-stretch">
               <div class="col-md-5 d-flex align-items-center justify-content-center border-end">
                  @if ($product->image)
                     <img src="{{ asset('storage/' . $product->image) }}" 
                        alt="{{ $product->name }}" 
                        class="w-100 img-thumbnail img-show rounded">
                  @else
                     <i class="fa-solid fa-image fa-10x text-muted"></i>
                  @endif
               </div>


               {{-- Product information --}}
               <div class="col-md-7">
                  <div class="card-body d-flex flex-column justify-content-between h-100">
                     <div class="card-body">
                        <h2 class="fw-bold">{{ $product->name }}</h2>
                        <div class="mb-2">
                           <span class="text-warning">
                              {{ str_repeat('★', floor($averageRating)) }}
                              {{ str_repeat('☆', 5 - floor($averageRating)) }}
                           </span>
                           <small class="text-muted ms-2">({{ number_format($averageRating, 1) }})</small>
                        </div>
                        <p class="text-muted">{{ $product->description }}</p>

                        <h4 class="text-danger mb-3">${{ number_format($product->price, 2) }}</h4>
                        <hr>

                        @auth
                        {{-- Add to cart --}}
                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                           @csrf
                           <input type="hidden" name="id" value="{{ $product->id }}">
                           <input type="hidden" name="name" value="{{ $product->name }}">
                           <input type="hidden" name="price" value="{{ $product->price }}">
                           <input type="hidden" name="weight" value="0">

                           <div class="mb-3 d-flex align-items-center">
                              <label for="quantity" class="me-2 mb-0 fw-bold">{{ __('messages.product.quantity') }}:</label>
                              <input type="number" id="quantity" name="qty" min="1" value="1" 
                                    class="form-control w-25">
                           </div>

                           <div class="row g-2">
                              <div class="col-md-6">
                                 <button type="submit" class="btn submit-button w-100">
                                    <i class="fas fa-shopping-cart"></i> {{ __('messages.product.add') }}
                                 </button>
                              </div>

                              {{-- Add to favorites / Remove favorite --}}
                              <div class="col-md-6">
                                 @if (Auth::user()->favorite_products()->where('product_id', $product->id)->exists())
                                    <a href="{{ route('favorites.destroy', $product->id) }}" 
                                       class="btn btn-outline-danger w-100 favorite-button"
                                       onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                                       <i class="fa fa-heart"></i> {{ __('messages.product.remove_fav') }}
                                    </a>
                                 @else
                                    <a href="{{ route('favorites.store', $product->id) }}" 
                                       class="btn btn-outline-secondary w-100 favorite-button"
                                       onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                                       <i class="fa fa-heart"></i> {{ __('messages.product.add_fav') }}
                                    </a>
                                 @endif
                              </div>
                           </div>
                        </form>

                        {{-- Form --}}
                        <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $product->id) }}" method="POST" class="d-none">
                           @csrf
                           @method('DELETE')
                        </form>
                        <form id="favorites-store-form" action="{{ route('favorites.store', $product->id) }}" method="POST" class="d-none">
                           @csrf
                        </form>
                        @endauth
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      {{-- Customer review --}}
      <div class="col-md-10 mt-5">
         <h3 class="fw-bold mb-3">{{ __('messages.product.customer_review') }}</h3>
         <div class="list-group">
            @forelse ($reviews as $review)
               <div class="list-group-item">
                  <h5 class="text-warning mb-1">{{ str_repeat('★', $review->score) }}</h5>
                  <strong>{{ $review->title }}</strong>
                  <p class="mb-1">{{ $review->content }}</p>
                  <small class="text-muted">{{ $review->created_at->format('Y/m/d') }} - {{ $review->user->name }}</small>
               </div>
            @empty
               <p class="text-muted">{{ __('messages.product.no_review') }}</p>
            @endforelse
         </div>
      </div>

      {{-- Write a Review --}}
      @auth
      <div class="col-md-10 mt-4">
         <div class="card shadow-sm">
            <div class="card-body">
               <h4 class="fw-bold mb-3">{{ __('messages.product.write_review') }}</h4>
               <form method="POST" action="{{ route('reviews.store') }}">
                  @csrf
                  <div class="mb-3">
                     <label class="form-label">{{ __('messages.product.rating') }}</label>
                     <select name="score" class="form-select w-25">
                        @for ($i = 5; $i >= 1; $i--)
                           <option value="{{ $i }}">{{ str_repeat('★', $i) }}</option>
                        @endfor
                     </select>
                  </div>

                  <div class="mb-3">
                     <label class="form-label">{{ __('messages.product.title') }}</label>
                     <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                     @error('title')
                        <div class="invalid-feedback">{{ __('messages.product.error_title') }}</div>
                     @enderror
                  </div>

                  <div class="mb-3">
                     <label class="form-label">{{ __('messages.product.review') }}</label>
                     <textarea name="content" rows="3" class="form-control @error('content') is-invalid @enderror"></textarea>
                     @error('content')
                        <div class="invalid-feedback">{{ __('messages.product.error_review') }}</div>
                     @enderror
                  </div>

                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" class="btn btn-success">{{ __('messages.product.submit') }}</button>
               </form>
            </div>
         </div>
      </div>
      @endauth

   </div>
</div>
@endsection