<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success','done');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $perPage = 12; // Số lượng sản phẩm hiển thị trên mỗi trang
        $products = Product::orderBy('created_at', 'desc')->paginate($perPage);
        return view('livewire.shop-component', ['products' => $products]);
    }
}
