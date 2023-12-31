<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li class="active">Yêu thích</li>
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
                                                <th class="li-product-price">Giá cả</th>
                                                <!-- <th class="li-product-stock-status">Stock Status</th> -->
                                                <th class="li-product-add-cart">Thêm vào giỏ hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @if($count > 0)
                                            @foreach($userWishlist as $item)
                                            <tr>
                                                <form id="deleteForm{{$item->id}}" action="{{ route('Shop.deleteWishlist', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td class="li-product-remove">
                                                        <!-- Đưa sự kiện onclick vào thẻ <a> -->
                                                        <a href="#" onclick="if (confirm('Xác nhận xóa sản phẩm!')) { document.getElementById('deleteForm{{$item->id}}').submit(); }">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </form>

                                                <td class="li-product-thumbnail"><a href="#"><img class="thumbnail-image2" src="{{asset('storage/'.$item->image)}}" alt=""></a></td>
                                                <td class="li-product-name"><a href="#">{{$item->name}}</a></td>
                                                <td class="li-product-price">
                                                    <span class="amount">
                                                        {{ number_format($item->price, 0, ",", ".") }} Vnđ
                                                    </span>
                                                </td>
                                                <!-- <td class="li-product-stock-status"><span class="in-stock">in stock</span></td> -->
                                                <form id="addForm{{$item->id}}" action="{{route('Wishlist.addCart')}}" method="POST" class="cart-quantity">
                                                @csrf
                                                <input type="hidden" name="product_code" value="{{$item->product_code}}">
                                                <td class="li-product-add-cart">
                                                    <a href="#" onclick="event.preventDefault(); document.getElementById('addForm{{$item->id}}').submit();">Thêm</a>
                                                </td>
                                                </form>
                                            </tr>
                                            @php $user_id = $item->user_id @endphp
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6">Sản phẩm không tồn tại</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @if($count > 0)
                                      
                                        <ul class="add-actions-link">
                                            <form id="deleteWishlistForm{{$user_id}}" action="{{ route('Shop.deleteAllWishlist', $user_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                        <a href="#" onclick="if (confirm('Xác nhận xóa toàn bộ danh sách yêu thích!')) { document.getElementById('deleteWishlistForm{{$user_id}}').submit(); }">
                                                X Xóa tất cả
                                            </a>
                                            </form>
                                        </ul>
                                        
                                        @endif
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>