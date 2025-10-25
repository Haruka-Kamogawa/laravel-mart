@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
            @endcomponent
        </div>
        <div class="col-9">
            <div class="">
                @if ($category !== null)
                    <a href="{{ route('top') }}">{{ __('messages.product_list.home') }}</a> > <a href="#">{{ $major_category->name}}</a> > {{ $category->name }}
                    <h2>{{ __('messages.product_list.products_in_category', ['category' => $category->name, 'count' => $total_count]) }}</h2>
                @elseif($keyword !== null)
                    <a href="{{ route('top') }}">{{ __('messages.product_list.home') }}</a> > {{ __('messages.product_list.all_products') }}
                    <h2>{{ __('messages.product_list.results_for', ['keyword' => $keyword, 'count' => $total_count]) }}</h2>
                @else
                    <a href="{{ route('top') }}">{{ __('messages.product_list.home') }}</a> > {{ __('messages.product_list.products_list') }}
                    <h2>{{ __('messages.product_list.total_items', ['count' => $total_count]) }}</h2>
                @endif
            </div>


            @if ($total_count > 0)
                <div class="text-end mt-3">
                    {{ __('messages.product_list.sort') }} :
                    @sortablelink('id', __('messages.product_list.sort_newest'), [], ['class' => 'sortable'])
                    /
                    @sortablelink('price', __('messages.product_list.sort_price'), [], ['class' => 'sortable'])
                </div>
            @endif



            <div class="container mt-2">
                <div class="row w-100">
                    @foreach($products as $product)
                    <div class="col-3">
                        <a href="{{route('products.show', $product)}}">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image ) }}" alt="{{ $product->image }}" class="img-thumbnail img-products">
                            @else
                                <i class="fa-solid fa-image fa-10x text-center w-100"></i>
                            @endif
                        </a>
                        <div class="row">
                            <div class="col-12">
                                <p class="product-label mt-2">
                                    {{$product->name}}<br>
                                    <label>${{$product->price}}</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection