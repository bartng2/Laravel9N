<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
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


    use WithPagination;
    public $orderBy = "Default Sorting";

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function render()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Lấy danh sách sản phẩm trong Wishlist của người dùng
            $wishlistProducts = Wishlist::where('user_id', $user->id)->pluck('product_code')->toArray();
        } else {
            // Nếu người dùng chưa đăng nhập, danh sách Wishlist rỗng
            $wishlistProducts = [];
        }

        $perPage = 12; // Số lượng sản phẩm hiển thị trên mỗi trang

        if ($this->orderBy == "Price: Low to High") {
            $products = Product::where('category_id', 17)->orderBy('price', 'ASC')->paginate($perPage);
        }
        else if ($this->orderBy == "Price: High to Low") {
            $products = Product::where('category_id', 17)->orderBy('price', 'DESC')->paginate($perPage);
        }
        else if ($this->orderBy == "Sort by Newness") {
            $products = Product::where('category_id', 17)->orderBy('created_at', 'DESC')->paginate($perPage);
        }
        else {
            $products = Product::where('category_id', 17)->paginate($perPage);
        }

        foreach ($products as $product) {
        $product->is_favorite = in_array($product->product_code, $wishlistProducts);
        }

        return view('livewire.shop-component', [
            'products' => $products,

        ]);
    }

    
}
