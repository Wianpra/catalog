<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Product;
use App\Category;
use App\mainCategories;
use App\SocialMedia;

class IndexCatalog extends Component
{
    use WithPagination;
    public $search;

    public function Searching()
    {
        $this->search = $this->search;
    }

    public function render()
    {
        return view('livewire.index-catalog', [
            'product' => $this->search === null ? Product::orderBy('seen', 'desc')->paginate(4) : Product::orderBy('seen', 'desc')->where('name', 'like', '%' . $this->search . '%')->paginate(4),
            'category' => Category::take(7)->get(),
            'main_category' => mainCategories::all(),
            'data' => SocialMedia::all(),
        ]);
    }
}
