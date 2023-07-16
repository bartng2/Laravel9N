<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartComponent extends Component
{
    public $quantity = 1;

    public function addCart()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $product = Product::find($this->product_code);

        if (!$product) {
            return redirect()->back();
        }

        $existItem = Cart::where('product_code', $this->product_code)
                            ->where('user_id', $user->id)
                            ->first();

        if ($existItem) {
            $existItem->quantity += $this->quantity;
            $existItem->save();
        }else{
            Cart::create([
                'product_image' => $product->image,
                'product_code' => $product->product_code,
                'product_price' => $product->price,
                'product_quantity' => $this->quantity,
                'user_id' => $user->id,
            ]);
        }

        $this->quantity = 1;
    }


    public function updateCart(Request $request, string $id)
    {

        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }
        $cart->product_quantity = $request->product_quantity;
        $cart->save();

        return redirect()->back();
    }

    public function destroyCart(string $id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        $cart->delete();

        return redirect()->back();
    }


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

        return view('livewire.cart-component', [
            'userCart' => $this->userCart,
            'count' => $this->count
        ]);
    }
}
