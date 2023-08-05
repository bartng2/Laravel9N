<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Shop2Component extends Component
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

        $perPage = 12; // Số lượng sản phẩm hiển thị trên mỗi trang
        if ($this->orderBy == "Price: Low to High") {
            $products = Product::orderBy('price', 'ASC')->paginate($perPage);
        }
        else if ($this->orderBy == "Price: High to Low") {
            $products = Product::orderBy('price', 'DESC')->paginate($perPage);
        }
        else if ($this->orderBy == "Sort by Newness") {
            $products = Product::orderBy('created_at', 'DESC')->paginate($perPage);
        }
        else{
            $products = Product::paginate($perPage);
        }
        return view('livewire.shop2-component', ['products' => $products]);
    }
}
