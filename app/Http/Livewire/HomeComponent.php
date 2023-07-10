<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class HomeComponent extends Component
{
    public function render()
    {
        $nproducts = Product::latest()->take(10)->get();
        return view('livewire.home-component', ['nproducts'=>$nproducts]);
    }
}
