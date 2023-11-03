<div>
    <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li class="active">Cart</li>
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
                                                <th class="li-product-remove">remove</th>
                                                <th class="li-product-thumbnail">Images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Price</th>
                                                <th class="li-product-stock-status">Quantity</th>
                                                
                                                <th class="li-product-add-cart">Update / Check out</th>
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
                                                        <a href="#" onclick="if (confirm('Product deletion confirmation!')) { document.getElementById('deleteForm{{$item->id}}').submit(); }">
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
                                                        <a href="#" style="font-size: 10px;" onclick="event.preventDefault(); document.getElementById('updateForm{{$item->id}}').submit();">Update</a>
                                                        <a href="{{route('shop.checkout',['id' => $item->id])}}" style="font-size: 10px;">Check out</a>
                                                    </td>
                                            </form>
                                                </tr>
                                                @php $user_id = $item->user_id @endphp
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6">No products in cart</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                     @if($count > 0)
                                      
                                        <ul class="add-actions-link">
                                            <form id="deleteForm{{$user_id}}" action="{{ route('Shop.deleteAllCart', $user_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                            <a href="#" onclick="if (confirm('Confirm to delete the entire cart!')) { document.getElementById('deleteForm{{$user_id}}').submit(); }">
                                                X Clear Cart
                                            </a>
                                            </form>
                                            <li class="add-cart active"><a href="#">Check all cart</a></li>
                                        </ul>
                                        
                                        @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Wishlist Area End-->
           
    </div>

                </div>
            </div> 
</div>
