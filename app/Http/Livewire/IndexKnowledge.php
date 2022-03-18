<?php

namespace App\Http\Livewire;

use App\ProductKnowledge;
use Livewire\Component;

class IndexKnowledge extends Component
{
    public function render()
    {
        $knowledge = ProductKnowledge::where('deleted_at', null)->latest()->take(3)->get();
        return view('livewire.index-knowledge', compact('knowledge'));
    }
}
