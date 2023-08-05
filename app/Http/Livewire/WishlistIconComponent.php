<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistIconComponent extends Component
{
    public function render()
    {
        $user = Auth::user();

        if ($user) {
            $this->userWishlist = Wishlist::where('user_id', $user->id)->get();
            $this->count = Wishlist::where('user_id', $user->id)->count();
        } else {
            $this->userWishlist = [];
            $this->count = 0;
        }

        return view('livewire.wishlist-icon-component',[
            'userWishlist' => $this->userWishlist,
            'count' => $this->count
        ]);
    }
}
