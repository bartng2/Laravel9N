<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order; // Import model Order

class OrderComponent extends Component
{
    public function render()
    {
        // Lấy tất cả dữ liệu từ bảng order
        $orders = Order::all();

        // Truyền dữ liệu đến view
        return view('livewire.order-component', [
            'orders' => $orders,
        ]);
    }
}
