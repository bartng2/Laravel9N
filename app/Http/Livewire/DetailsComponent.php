<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Cart;

class DetailsComponent extends Component
{
    public $product_code;

    public function mount($product_code)
    {
        $this->product_code = $product_code;
    }

    public function render()
    {
        
        $product = Product::where('product_code',$this->product_code)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $review = Review::where('product_code', $this->product_code)->get();
        return view('livewire.details-component', ['product' => $product, 'rproducts'=>$rproducts, 'review' => $review]);
    }
}
