<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class NewProduct extends Component
{
    public $newProducts;

    /**
     * Create a new component instance.
     */
    /**
     * Get the view / contents that represent the component.
     */
    public function __construct($newProducts = null)
    {
        $this->newProducts = $newProducts ?? Product::with(['category', 'creator'])->latest()->take(4)->get();
    }

    public function render()
    {
        return view('components.new-product');
    }
}
