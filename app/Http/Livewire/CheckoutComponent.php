<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Cart;

class CheckoutComponent extends Component
{
    public $cart_id;

    public function mount($cart_id)
    {
        $this->id = $cart_id;
    }

    public function render()
    {
        $response = Http::get('https://provinces.open-api.vn/api/');
        $city = $response->json();

        $cart = Cart::where('id',$this->id)->first();

        return view('livewire.checkout-component', [
            'city'=>$city,
            'cart'=>$cart
        ]);
    }
}
