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
    public $search;
    
    public function filterCategory($id)
    {
        $this->categoryId = $id;
        $this->search = null;
    }

    public function updateSelected($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function Searching()
    {
        $this->search = $this->search;
    }

    public function render()
    {
        if ( $this->categoryId == null ) {
            $countProductAll = Product::count();
            $countProduct = Product::count();

            if ( $this->orderBy == null || $this->orderBy == "popular") {
                $product = $this->search === null ? Product::orderBy('seen', 'desc')->paginate(9) : Product::orderBy('seen', 'desc')->where('name', 'like', '%' . $this->search . '%')->paginate(9);
            } elseif( $this->orderBy == 'asc' ) {
                $product = $this->search === null ? Product::orderBy('name', 'asc')->paginate(9) : Product::orderBy('name', 'asc')->where('name', 'like', '%' . $this->search . '%')->paginate(9);
            } else {
                $product = $this->search === null ? Product::orderBy('name', 'desc')->paginate(9) : Product::orderBy('name', 'desc')->where('name', 'like', '%' . $this->search . '%')->paginate(9);
            }

        } else {
            
            $countProductAll = Product::count();
            $countProduct = Product::where('category', $this->categoryId)->count();
            
            if ( $this->orderBy == null || $this->orderBy == "popular") {
                $product = $this->search === null ? Product::where('category', $this->categoryId)->orderBy('seen', 'asc')->paginate(9) : Product::where('category', $this->categoryId)->orderBy('seen', 'asc')->where('name', 'like', '%' . $this->search . '%')->paginate(9);
            } elseif( $this->orderBy == 'asc' ) {
                $product = $this->search === null ? Product::where('category', $this->categoryId)->orderBy('name', 'asc')->paginate(9) : Product::where('category', $this->categoryId)->orderBy('name', 'asc')->where('name', 'like', '%' . $this->search . '%')->paginate(9);
            } else {
                $product = $this->search === null ? Product::where('category', $this->categoryId)->orderBy('name', 'desc')->paginate(9) : Product::where('category', $this->categoryId)->orderBy('name', 'desc')->where('name', 'like', '%' . $this->search . '%')->paginate(9);
            }

        }
        $category = Category::all();
        return view('livewire.product-catalog', compact('product', 'category', 'countProduct', 'countProductAll'));
    }
}
