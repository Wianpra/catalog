<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductKnowledge extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $data = DB::table('product_knowledge')->where('deleted_at', null)->paginate(6);
        return view('livewire.product-knowledge', compact('data'));
    }
}
