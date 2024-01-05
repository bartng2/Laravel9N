<!-- resources/views/livewire/order-component.blade.php -->

<div>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="active">Đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Wishlist Area Start -->
    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            @if(count($orders) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-thumbnail">Ảnh</th>
                                            <th class="cart-product-name">Tên sản phẩm</th>
                                            <th class="li-product-quantity">Số lượng</th>
                                            <th class="li-product-price">Tiền thanh toán</th>
                                            <th class="li-product-status">Trạng thái</th>
                                            <th class="li-received-button"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{ $order->image }}" alt=""></a></td>
                                                <td class="li-product-name"><a href="#">{{ $order->product_name }}</a></td>
                                                <td class="li-product-quantity">{{ $order->product_quantity }}</td>
                                                <td class="li-product-price"><span class="amount">{{ $order->product_price }}</span></td>
                                                <td class="li-product-status">
                                                    <span class="{{ $order->status === 'received' ? 'received-status' : 'not-received-status' }} text-danger">
                                                        {{ $order->status }}
                                                    </span>
                                                </td>
                                                <td class="li-received-button">
                                                    <button wire:click="markAsReceived({{ $order->id }})"
                                                        class="{{ $order->status === 'received' ? 'received-button' : 'processing-button' }}">
                                                        {{ $order->status === 'received' ? 'Đã nhận được hàng' : 'Đang xử lí' }}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Không có đơn hàng nào.</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Area End -->
</div>
