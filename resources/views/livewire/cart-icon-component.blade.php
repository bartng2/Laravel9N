<!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">Cart
                                                    @if($count>0)
                                                    <span class="cart-item-count">{{$count}}</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                @foreach($userCart as $item)
                                                <ul class="minicart-product-list">
                                                    <li>
                                                        <a href="{{ route('product.details', ['product_code' => $item->product_code]) }}" class="minicart-product-image">
                                                            <img src="{{asset('storage/'.$item->product_image)}}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="{{ route('product.details', ['product_code' => $item->product_code]) }}">{{substr($item->product_name,0,20)}}...</a></h6>
                                                            <span>{{ number_format($item->product_price, 0, ",", ".") }}đ x {{$item->product_quantity}}</span>
                                                        </div>
                                                        <button class="close">
                                                            <form id="deleteForm{{$item->id}}" action="{{ route('Shop.deleteCart', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <td class="li-product-remove">
                                                                    <a href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{$item->id}}').submit();"><i class="fa fa-times"></i>
                                                                    </a>
                                                            </td>
                                                            </form>
                                                        </button>
                                                    </li>
                                                </ul>
                                                @endforeach
                                                @php $total = 0 @endphp
                                                @foreach($userCart as $item)
                                                        @php 
                                                        $total += $item->product_price * $item->product_quantity @endphp
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