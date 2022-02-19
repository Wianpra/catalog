<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Category;
use App\Product;
use Livewire\WithPagination;

class ProductCatalog extends Component
{
    use WithPagination;
    public $categoryId;
    
    public function filterCategory($id)
    {
        $this->categoryId = $id;
    }

    public function render()
    {
        if ( $this->categoryId == null ) {
            $countProductAll = Product::count();
            $countProduct = Product::count();
            $product = Product::all();
        } else {
            $countProductAll = Product::count();
            $countProduct = Product::where('category', $this->categoryId)->count();
            $product = Product::where('category', $this->categoryId)->get();
        }
        $category = Category::all();
        return view('livewire.product-catalog', compact('product', 'category', 'countProduct', 'countProductAll'));
    }
}
