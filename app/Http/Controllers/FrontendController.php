<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        // $products = Product::where('creator_id', Auth::id())->get();
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function details(Product $product)
    {
        return view('frontend.details', [
            'product' => $product
        ]);
    }

    public function category(Category $category)
    {
        return view('frontend.category', [
            'category' => $category
        ]);
    }

    public function search(Request $request)
    {
        return view('frontend.search', []);
    }
}
