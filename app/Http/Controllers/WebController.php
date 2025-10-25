<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $major_categories = MajorCategory::all();

        $recommended_products = Cache::remember('recommended_products', 3600, function () {
        return Product::where('is_recommended', true)
                      ->take(4)
                      ->get();
        });

        $recently_products = Product::orderBy('created_at', 'desc')->take(8)->get();

        return view('web.index', compact('major_categories', 'categories', 'recommended_products', 'recently_products'));
    }
}
