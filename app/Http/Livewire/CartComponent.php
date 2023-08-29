<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartComponent extends Component
{
    public function addCart(Request $request)
    {

        $productCode = $request->input('product_code');
        $quantity = $request->input('quantity');

        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        if (!$user) {
            // Người dùng chưa đăng nhập, xử lý tùy ý, ví dụ: chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $product = Product::where('product_code', $productCode)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        $existingCartItem = Cart::where('product_code', $productCode)
                                ->where('user_id', $user->id)
                                ->first();

        if ($existingCartItem) {
            // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $existingCartItem->product_quantity += $quantity;
            $existingCartItem->save();
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            Cart::create([
                'user_id' => $user->id,
                'product_code' => $product->product_code,
                'product_name' => $product->name,
                'product_quantity' => $quantity,
                'product_price' => $product->price,
                'product_image' => $product->image,
            ]);
        }

        return redirect()->back();
    }


   public function updateCart(Request $request, string $id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        if ($request->product_quantity == 0) {
            // Xóa sản phẩm khỏi giỏ hàng
            $cart->delete();
        } else {
            // Cập nhật số lượng sản phẩm
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }

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

    

    public function destroyAllCart(string $user_id)
    {
        // Tìm giỏ hàng của người dùng
        $cart = Cart::where('user_id', $user_id)->get();

        if ($cart->isEmpty()) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        // Xóa tất cả các bản ghi của giỏ hàng của người dùng
        $cart->each->delete();

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
