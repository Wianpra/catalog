<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Category;
use App\mainCategories;
use App\Product;
use App\SocialMedia;
use Livewire\WithPagination;

class ProductCatalog extends Component
{
    use WithPagination;
    public $categoryId;
    public $mainCategoryId;
    public $orderBy;
    public $search;
    public $search_a;
    public $id_mainCategory;
    public $id_subCategory;
    
    public function mount($id_mainCategory, $id_subCategory, $search_a)
    {
        if ($id_mainCategory != null) {
            $this->mainCategoryId = $id_mainCategory;
        }elseif ($id_subCategory != null) {
            $this->categoryId = $id_subCategory;
        }elseif ($search_a != null) {
            $this->search = $search_a;
        }
    }

    public function filterCategory($id)
    {
        $this->categoryId = $id;
        $this->mainCategoryId = null;
        $this->search = null;
    }
    public function filterMainCategory($id)
    {
        $this->mainCategoryId = $id;
        $this->categoryId = null;
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
        if ($this->mainCategoryId != null) {
            $countProductAll = Product::count();
            $countProduct = Product::join('categories', 'categories.id', '=', 'products.category')
                ->where('categories.main_category', $this->mainCategoryId)->count();
            $product = $this->search === null ? Product::join('categories', 'categories.id', '=', 'products.category')->where('categories.main_category', $this->mainCategoryId)->paginate(9) : Product::join('categories', 'categories.id', '=', 'product.category')->where('categories.main_category', $this->mainCategoryId)->where('name', 'like', '%' . $this->search . '%')->paginate(9);

        }elseif ( $this->categoryId == null ) {
            $countProductAll = Product::count();
            $countProduct = $this->search === null ? Product::count() : Product::where('name', 'like', '%' . $this->search . '%')->count();
            $product = $this->search === null ? Product::paginate(9) : Product::where('name', 'like', '%' . $this->search . '%')->paginate(9);

        } else {
            $countProductAll = Product::count();
            $countProduct = Product::where('category', $this->categoryId)->count();
            $product = $this->search === null ? Product::where('category', $this->categoryId)->paginate(9) : Product::where('category', $this->categoryId)->where('name', 'like', '%' . $this->search . '%')->paginate(9);
        }
        $category = Category::all();
        $main_category = mainCategories::all();
        $datas = SocialMedia::all();
        // dd($product);
        return view('livewire.product-catalog', compact('product', 'category', 'countProduct', 'countProductAll', 'main_category', 'datas'));
    }
}
