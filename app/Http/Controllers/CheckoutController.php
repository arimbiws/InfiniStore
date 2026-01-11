<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function checkout(Product $product)
    {
        return view('frontend.checkout', [
            'product' => $product
        ]);
    }
}
