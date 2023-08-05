<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class HomeComponent extends Component
{
    public function render()
    {
        $nproducts = Product::latest()->take(10)->get();
        $laptop = Product::where('category_id', 20)->take(10)->get();
        return view('livewire.home-component', [
            'nproducts'=>$nproducts,
            'laptop' => $laptop
        ]);
    }
}
