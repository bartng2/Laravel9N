<div>
    <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li class="active">Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Wishlist Area Strat-->
            <div class="wishlist-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">Xóa</th>
                                                <th class="li-product-thumbnail">Ảnh</th>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="li-product-price">Giá cả / sản phẩm</th>
                                                <th class="li-product-stock-status">Số lượng</th>
                                                
                                                <th class="li-product-add-cart">Cập nhật / Đặt hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                            @foreach($userCart as $item)
                                                <tr>
                                                    <form id="deleteForm{{$item->id}}" action="{{ route('Shop.deleteCart', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td class="li-product-remove">
                                                        <a href="#" onclick="if (confirm('Xác nhận xóa sản phẩm!')) { document.getElementById('deleteForm{{$item->id}}').submit(); }">
                                                                <i class="fa fa-times" ></i>
                                                            </a>
                                                    </td>
                                                    </form>
                                                    <form id="updateForm{{$item->id}}" action="{{ route('Shop.updateCart', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <td class="li-product-thumbnail"><a href="#"><img class="thumbnail-image2" src="{{ asset('storage/'.$item->product_image) }}" alt=""></a></td>
                                                    <td class="li-product-name"><a href="#">{{ $item->product_name }}</a></td>
                                                    <td class="li-product-price">
                                                        <span class="amount">
                                                            {{ number_format($item->product_price, 0, ",", ".") }} Vnđ
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="cart-plus-minus">
                                                            <input name="product_quantity" class="cart-plus-minus-box" value="{{ $item->product_quantity }}" type="text">
                                                            <a href="#" class="dec qtybutton"><i class="fa fa-angle-down"></i></a>
                                                            <a href="#" class="inc qtybutton"><i class="fa fa-angle-up"></i></a>
                                                        </div>
                                                    </td>
                                                    <td class="li-product-add-cart">
                                                        <a href="#" style="font-size: 10px;" onclick="event.preventDefault(); document.getElementById('updateForm{{$item->id}}').submit();">Cập nhật</a>
                                                        <a href="{{route('shop.checkout',['cart_id' => $item->cart_id])}}" style="font-size: 10px;">Đặt hàng</a>
                                                    </td>
                                            </form>
                                                </tr>
                                                @php $user_id = $item->user_id @endphp
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6">Không có sản phẩm nào</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                     @if($count > 0)
                                      
                                        <ul class="add-actions-link">
                                            <form id="deleteForm{{$user_id}}" action="{{ route('Shop.deleteAllCart', $user_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                            <a href="#" onclick="if (confirm('Xác nhận xóa toàn bộ giỏ hàng!')) { document.getElementById('deleteForm{{$user_id}}').submit(); }">
                                                X Xóa giỏ hàng
                                            </a>
                                            </form>
                                            
                                            
                                        </ul>
                                            
                                        @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Wishlist Area End-->
           
    </div>
