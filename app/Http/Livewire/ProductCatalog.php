<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Category;
use App\Product;

class ProductCatalog extends Component
{
    public function render()
    {
        $product = Product::all();
        $category = Category::all();
        return view('livewire.product-catalog', compact('product', 'category'));
    }
}
