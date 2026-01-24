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
        // $products = Product::all();
        $categories = Category::all();
        return view('frontend.index', [
            // 'products' => $products,
            'categories' => $categories,
            // 'newProducts' => $newProducts,

        ]);
    }

    public function details(Product $product)
    {
        $product->load(['category', 'creator']);
        // $more_products = Product::where('id', '!=', $product)->get();

        $more_products = Product::where('id', '!=', $product->id)
            ->with(['category', 'creator'])
            ->latest()
            ->take(4)
            ->get();

        $creator_id = $product->creator_id;
        $creator_products = Product::where('creator_id', $creator_id)->get();

        return view('frontend.details', [
            'product' => $product,
            'more_products' => $more_products,
            'creator_products' => $creator_products,
        ]);
    }

    public function category(Category $category)
    {
        // ambil semua product di category ini
        $products = Product::with(['category', 'creator'])
            ->where('category_id', $category->id)
            ->latest()
            ->get();

        return view('frontend.category', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->q;

        $products = Product::with(['category', 'creator'])
            ->where('name', 'like', "%{$keyword}%")
            ->latest()
            ->get();

        return view('frontend.search', [
            'products' => $products,
            'keyword' => $keyword,
        ]);
    }
}
