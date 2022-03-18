<?php

namespace App\Http\Livewire;

use App\Founder;
use Livewire\Component;

class IndexFounder extends Component
{
    public function render()
    {
        $founder = Founder::where('deleted_at', null)->get();
        return view('livewire.index-founder', compact('founder'));
    }
}
