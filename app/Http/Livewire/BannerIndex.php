<?php

namespace App\Http\Livewire;

use App\Banner;
use Livewire\Component;

class BannerIndex extends Component
{
    public function render()
    {
        $banner = Banner::where('deleted_at', null)->latest()->get();
        return view('livewire.banner-index', compact('banner'));
    }
}
