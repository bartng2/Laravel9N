<div>
    <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Wishlist</li>
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
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">remove</th>
                                                <th class="li-product-thumbnail">Images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Total Price</th>
                                                <th class="li-product-stock-status">Quantity</th>
                                                
                                                <th class="li-product-add-cart">Check out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(Cart::count() > 0)
                                            @foreach(Cart::content() as $item)
                                            <tr>
                                                <td class="li-product-remove"><a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img class="thumbnail-image2" src="{{asset('storage/'.$item->model->image)}}" alt=""></a></td>
                                                <td class="li-product-name"><a href="#">{{$item->model->name}}</a></td>
                                                <td class="li-product-price"><span class="amount">
                                                    {{ number_format($item->model->price, 0, ",", ".") }} Vnđ
                                                </span></td>
                                                <td class="li-product-stock-status">
                                                    <div class="cart-plus-minus">
                                                    <a href="#" class="dec qtybutton" wire:click.prevent="decreaseQty('{{$item->rowId}}')"><i class="fa fa-angle-down"></i></a>
                                                    <input class="cart-plus-minus-box" value="{{$item->qty}}">
                                                    <a href="#" class="inc qtybutton" wire:click.prevent="increaseQty('{{$item->rowId}}')"><i class="fa fa-angle-up"></i></a>
                                                </div>
                                                </td>

                                                <td class="li-product-add-cart"><a href="#">Check out</a></td>

                                            </tr>

                                            @endforeach
                                            @else
                                            <p>No products in cart</p>
                                            @endif
                                        </tbody>
                                    </table>
                                     @if(Cart::count() > 0)
                                        <ul class="add-actions-link">
                                            <p><a class="add-cart active" href="#" wire:click.prevent="clearAll()">x Clear all</a></p>
                                            <li class="add-cart active"><a href="#">Check cart</a></li>
                                        </ul>
                                        @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Wishlist Area End-->
</div>
