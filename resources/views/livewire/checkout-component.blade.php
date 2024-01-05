<div>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Đặt hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <!--Accordion Start-->
                        <div id="checkout-login" class="coupon-content">
                        </div>
                        <!--Accordion End-->
                        <!--Accordion Start-->
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!--Accordion End-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="#">
                        <div class="checkbox-form">
                            <h3>Chi tiết thanh toán</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Thành phố <span class="required">*</span></label>
                                        <select class="nice-select wide select2">
                                            @foreach($city as $item)
                                                <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ chi tiết <span class="required">*</span></label>
                                        <input placeholder="Địa chỉ" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Tên <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Họ <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Điện thoại <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">{{ $cart->product_name }}<strong
                                                class="product-quantity"> × {{ $cart->product_quantity }}</strong></td>
                                        <td class="cart-product-total"><span
                                                class="amount">{{ number_format($cart->product_price, 0, ",", ".") }}
                                                Vnđ</span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tổng giỏ hàng</th>
                                        <td><span class="amount">
                                                {{ number_format($cart->product_price * $cart->product_quantity, 0, ",", ".") }}
                                                Vnđ
                                            </span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Phí vận chuyển</th>
                                        <td><span class="amount">Miễn phí</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng thanh toán</th>
                                        <td><strong><span
                                                    class="amount">{{ number_format($cart->product_price * $cart->product_quantity, 0, ",", ".") }}
                                                    Vnđ </span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="order-button-payment">
                                    <!-- <input class="quick-view" wire:click="placeOrder" value="Thanh toán"></input> -->
                                     <input class="quick-view" wire:click="placeOrder" value="Thanh toán" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
