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
    public $orderBy;
    
    public function filterCategory($id)
    {
        $this->categoryId = $id;
    }

    public function updateSelected($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        if ( $this->categoryId == null ) {

            $countProductAll = Product::count();
            $countProduct = Product::count();

            if ( $this->orderBy == null || $this->orderBy == "popular") {
                $product = Product::orderBy('seen', 'desc')->paginate(9);
            } elseif( $this->orderBy == 'asc' ) {
                $product = Product::orderBy('name', 'asc')->paginate(9);
            } else {
                $product = Product::orderBy('name', 'desc')->paginate(9);
            }

        } else {

            $countProductAll = Product::count();
            $countProduct = Product::where('category', $this->categoryId)->count();
            
            if ( $this->orderBy == null || $this->orderBy == "popular") {
                $product = Product::where('category', $this->categoryId)->orderBy('seen', 'asc')->paginate(9);
            } elseif( $this->orderBy == 'asc' ) {
                $product = Product::where('category', $this->categoryId)->orderBy('name', 'asc')->paginate(9);
            } else {
                $product = Product::where('category', $this->categoryId)->orderBy('name', 'desc')->paginate(9);
            }

        }
        $category = Category::all();
        return view('livewire.product-catalog', compact('product', 'category', 'countProduct', 'countProductAll'));
    }
}
