<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistComponent extends Component
{
    public function addCart(Request $request)
    {

        $productCode = $request->input('product_code');
        $quantity = 1;

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

    public function addWishlist(Request $request)
    {

        $productCode = $request->input('product_code');

        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        if (!$user) {
            // Người dùng chưa đăng nhập, xử lý tùy ý, ví dụ: chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $product = Product::where('product_code', $productCode)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        } else{

            $existingWishlistItem = Wishlist::where('product_code', $productCode)
                                ->where('user_id', $user->id)
                                ->first();
        }        

        if ($existingWishlistItem) {

            return redirect()->back();

        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            Wishlist::create([
                'user_id' => $user->id,
                'product_code' => $product->product_code,
                'category_id' => $product->category_id,
                'name' => $product->name,
                'brand' => $product->brand,
                'rate' => $product->rate,
                'price' => $product->price,
                'description' => $product->description,
                'image' => $product->image
            ]);
        }

        return redirect()->back();
    }
    
    public function destroyWishlist(string $id)
    {
        $Wishlist = Wishlist::find($id);

        if (!$Wishlist) {
            return response()->json(['message' => 'Không tìm thấy'], 404);
        }

        $Wishlist->delete();

        return redirect()->back();
    }


    public function destroyAllWishlist(string $user_id)
    {
        // Tìm giỏ hàng của người dùng
        $Wishlist = Wishlist::where('user_id', $user_id)->get();

        if ($Wishlist->isEmpty()) {
            return response()->json(['message' => 'Không tìm thấy'], 404);
        }

        // Xóa tất cả các bản ghi của giỏ hàng của người dùng
        $Wishlist->each->delete();

        return redirect()->back();
    }


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

        return view('livewire.wishlist-component', [
            'userWishlist' => $this->userWishlist,
            'count' => $this->count
        ]);
    }
}
