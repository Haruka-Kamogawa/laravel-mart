<div class="container border-end">
    @foreach ($major_categories as $major_category)
    <div class="mb-4">
        <h2>{{ $major_category->name }}</h2>
        @foreach ($categories as $category)
            @if ($category->major_category_id === $major_category->id)
            <div class="mb-1">
                <label for="" class="sidebar-category-label"><a href="{{ route('products.index', ['category' => $category->id])}}" class="text-decoration-none text-dark">{{ $category->name }}</a></label>
            </div>
            @endif
        @endforeach
    </div>
    @endforeach
</div>