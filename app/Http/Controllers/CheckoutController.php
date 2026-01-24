<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    function checkout(Product $product)
    {
        return view('frontend.checkout', [
            'product' => $product
        ]);
    }

    function store(Request $request, Product $product)
    {
        if ($product->creator_id === Auth::id()) {
            $error = ValidationException::withMessages([
                'system_error' => ['Can not buy your own product'],
            ]);
            throw $error;
        }
        $validated = $request->validate([
            'proof' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('payment_proofs', 'public');
            $validated['proof'] = $proofPath;
        }

        $data = [
            'total_price' => $product->price,
            'is_paid' => false,
            'buyer_id' => Auth::id(),
            'creator_id' => $product->creator->id,
            'product_id' => $product->id,
            'proof' => $validated['proof'],
        ];

        DB::beginTransaction();

        try {
            $newOrder = ProductOrder::firstOrCreate($data);

            DB::commit();

            return redirect()->route('admin.product_orders.index')->with('success', 'Checkout successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],

            ]);

            throw $error;
        }
    }
}
