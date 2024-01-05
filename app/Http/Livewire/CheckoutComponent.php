<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Cart;
use App\Models\Order;

class CheckoutComponent extends Component
{
    public $cart_id;

    public function mount($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    public function render()
    {
        $response = Http::get('https://provinces.open-api.vn/api/');
        $city = $response->json();

        $cart = Cart::where('cart_id', $this->cart_id)->first();

        return view('livewire.checkout-component', [
            'city' => $city,
            'cart' => $cart
        ]);
    }

    public function placeOrder()
    {
        // Lấy thông tin giỏ hàng
        $cart = Cart::where('cart_id', $this->cart_id)->first();

        // Tạo đơn hàng mới
        $order = new Order();
        $order->user_id = $cart->user_id;
        $order->product_name = $cart->product_name;
        $order->product_quantity = $cart->product_quantity;
        $order->product_price = $cart->product_price;
        $order->status = 'Đang xử lí'; // Giả sử đơn hàng mới được tạo có trạng thái pending

        // Lưu đơn hàng
        $order->save();

        // Cập nhật trạng thái giỏ hàng hoặc xóa giỏ hàng (tùy thuộc vào logic của bạn)
        // Ví dụ:
        // $cart->update(['status' => 'ordered']); // Cập nhật trạng thái giỏ hàng
        // hoặc
        $cart->delete(); // Xóa giỏ hàng

        // Hiển thị thông báo hoặc chuyển hướng đến trang cảm ơn
        session()->flash('message', 'Đơn hàng đã được đặt thành công!');
        return redirect()->route('order'); // Thay thế 'thank-you-page' bằng route thực tế của bạn
    }
}
