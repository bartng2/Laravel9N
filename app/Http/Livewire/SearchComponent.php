<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $orderBy = "Default Sorting";
    public $query = '';

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

        $query = Product::query();

        if ($this->orderBy == "Price: Low to High") {
            $query->orderBy('price', 'ASC');
        } else if ($this->orderBy == "Price: High to Low") {
            $query->orderBy('price', 'DESC');
        } else if ($this->orderBy == "Sort by Newness") {
            $query->orderBy('created_at', 'DESC');
        }

        $products = $query->where('name', 'like', "%$this->query%")
                          ->orWhere('brand', 'like', "%$this->query%")
                          ->paginate($perPage);

        foreach ($products as $product) {
            $product->is_favorite = in_array($product->product_code, $wishlistProducts);
        }

        return view('livewire.search-component', ['products' => $products]);
    }
}
