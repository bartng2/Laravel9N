<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartIconComponent extends Component
{

    public function render()
    {
        $user = Auth::user();

        if ($user) {
            $this->userCart = Cart::where('user_id', $user->id)->get();
            $this->count = Cart::where('user_id', $user->id)->count();
        } else {
            $this->userCart = [];
            $this->count = 0;
        }

        return view('livewire.cart-icon-component', [
            'userCart' => $this->userCart,
            'count' => $this->count
        ]);
    }
}
