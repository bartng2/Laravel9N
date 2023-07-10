<!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">Cart
                                                    @if(Cart::count()>0)
                                                    <span class="cart-item-count">{{Cart::count()}}</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                @foreach(Cart::content() as $item)
                                                <ul class="minicart-product-list">
                                                    <li>
                                                        <a href="{{ route('product.details', ['product_code' => $item->model->product_code]) }}" class="minicart-product-image">
                                                            <img src="{{asset('storage/'.$item->model->image)}}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="{{ route('product.details', ['product_code' => $item->model->product_code]) }}">{{substr($item->model->name,0,20)}}...</a></h6>
                                                            <span>{{ number_format($item->model->price, 0, ",", ".") }}đ x {{$item->qty}}</span>
                                                        </div>
                                                        <button class="close">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                                @endforeach
                                                @php $total = 0 @endphp
                                                @foreach(Cart::content() as $item)
                                                        @php 
                                                        $total += $item->model->price * $item->qty @endphp
                                                    @endforeach
                                                <p class="minicart-total">SUBTOTAL: <span>{{ number_format($total, 0, ",", ".") }}đ</span></p>
                                                <div class="minicart-button">
                                                    <a href="{{route('shop.cart')}}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="checkout.html" class="li-button li-button-fullwidth li-button-sm">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->