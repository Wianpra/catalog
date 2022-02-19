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
            $product = Product::all();
        } else {
            $product = Product::where('category', $this->categoryId)->get();
        }
        $category = Category::all();
        return view('livewire.product-catalog', compact('product', 'category'));
    }
}
