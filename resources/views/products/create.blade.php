@extends('layouts.app')

@section('content')
    
<div class="container">
   <h1>Add a product</h1>

   <hr>

   <form action="{{ route('products.store') }}" method="POST">
       @csrf
       <div class="form-group">
           <label for="product-name">Product</label>
           <input type="text" name="name" id="product-name" class="form-control">
       </div>
       <div class="form-group">
           <label for="product-description">Description</label>
           <textarea name="description" id="product-description" class="form-control"></textarea>
       </div>
       <div class="form-group">
           <label for="product-price">Price</label>
           <input type="number" name="price" id="product-price" class="form-control">
       </div>
       <div class="form-group">
           <label for="product-category">Category</label>
           <select name="category_id" class="form-control" id="product-category">
               @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
           </select>
       </div>
       <button type="submit" class="btn btn-success">Save</button>
   </form>

   <a href="{{ route('products.index') }}">Back to the products list</a>
</div>
@endsection