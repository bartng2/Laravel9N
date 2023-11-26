<div>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Điện thoại & Tablet</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2 mx-auto"> <!-- Thêm lớp mx-auto để căn giữa khối -->
                    <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <div class="toolbar-amount">
                                        <span>Hiển thị 1 -> 9 trong {{$products->total()}} sản phẩm</span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->

                                <div class="product-select-box">
                                    <div class="product-short">
                                        <div class="hb-menu">
                                   <nav>
                                       <ul>
                                           <li class="dropdown-holder"><a>Sắp xếp</a>
                                               <ul class="hb-dropdown">
                                                   <li><a class="{{$orderBy == 'Default Sorting' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Default Sorting')">Mặc định</a>
                                                   </li>
                                                   <li><a class="{{$orderBy == 'Price: Low to High' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">Giá: Thấp đến Cao</a>
                                                   </li>
                                                   <li><a class="{{$orderBy == 'Price: High to Low' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">Giá: cao đến thấp</a>
                                                   </li>
                                                   <li><a class="{{$orderBy == 'Sort by Newness' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Sort by Newness')">Mới nhất</a>
                                                   </li>
                                               </ul>
                                           </li>
                                       </ul>
                                   </nav>
                               </div>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                           <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                                
                                                @foreach($products as $item)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{ route('product.details', ['product_code' => $item->product_code]) }}">
                                                                <img src="{{ asset('storage/' .$item->image) }}" alt="Li's Product Image">
                                                            </a>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <span>{{ $item->brand }}</span>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="{{ route('product.details', ['product_code' => $item->product_code]) }}">{{ $item->name }}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">
                                                                        {{ number_format($item->price, 0, ",", ".") }} Vnđ
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link d-flex justify-content-center">
                                                                <form action="{{route('Shop.addCart')}}" method="POST">
                                                                @csrf 
                                                                <input type="hidden" name="product_code" value="{{$item->product_code}}">
                                                                <input type="hidden" name="quantity" id="quantity">
                                                                    <li class="add-cart active">
                                                                        <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addCart') }}" data-product-code="{{ $item->product_code }}">+ Giỏ hàng</a>
                                                                    </li>
                                                                </form>
                                                                 
                                                                
                                                                <form action="{{ route('Shop.addWishlist') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_code" value="{{ $item->product_code }}">
                                                                @if($item->is_favorite)
                                                                <li style="background-color: yellow;">
                                                                    <!-- Thêm kiểm tra để tô màu vàng biểu tượng trái tim -->
                                                                    
                                                                    <a class="links-details" onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addWishlist') }}" data-product-code="{{ $item->product_code }}">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </a>
                                                                    
                                                                    
                                                                </li>
                                                                @else
                                                                <li>
                                                                    <!-- Thêm kiểm tra để tô màu vàng biểu tượng trái tim -->
                                                                    
                                                                    <a class="links-details" onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addWishlist') }}" data-product-code="{{ $item->product_code }}">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </a>
                                                                    
                                                                    
                                                                </li>
                                                                @endif
                                                                </form>
                                                               
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                 @foreach($products as $item)
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="#">
                                                                <img src="{{asset('storage/'.$item->image)}}" alt="Li's Product Image">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <span>{{$item->brand}}</span>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><span class="product_name" href="#">{{$item->name}}</span></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">
                                                                         {{ number_format($item->price, 0, ",", ".") }} Vnđ
                                                                    </span>
                                                                </div>
                                                                <p>
                                                                    {{$item->description}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                                
                                                                <li class="add-cart">
                                                                    <form action="{{route('Shop.addCart')}}" method="POST">
                                                                    @csrf 
                                                                    <input type="hidden" name="product_code" value="{{$item->product_code}}">
                                                                    <input type="hidden" name="quantity" id="quantity">
                                                                    <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addCart') }}" data-product-code="{{ $item->product_code }}">
                                                                        + Giỏ hàng
                                                                    </a>
                                                                    </form>
                                                                </li>
                                                                <form action="{{ route('Shop.addWishlist') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_code" value="{{ $item->product_code }}">
                                                                    <!-- Kiểm tra xem sản phẩm đã tồn tại trong Wishlist hay không -->
                                                                    <li class="wishlist">
                                                                        <a class="links-details @if($item->is_favorite) yellow-heart @endif" onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addWishlist') }}" data-product-code="{{ $item->product_code }}">
                                                                            <i class="fa fa-heart-o"></i>+ Yêu thích
                                                                        </a>
                                                                    </li>
                                                                </form>
                                                                <li class="wishlist"><a href="{{ route('product.details', ['product_code' => $item->product_code]) }}"><i class="fa fa-eye"></i>Xem</a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Hiển thị {{ $products->firstItem() }}-{{ $products->lastItem() }} trong {{ $products->total() }} sản phẩm</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="{{ $products->previousPageUrl() }}" class="Previous"><i class="fa fa-chevron-left"></i> Trờ lại</a></li>
                                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                        <li class="{{ $products->currentPage() == $page ? 'active' : '' }}"><a href="{{ $url }}">{{ $page }}</a></li>
                                                    @endforeach
                                                    <li><a href="{{ $products->nextPageUrl() }}" class="Next"> Tiếp <i class="fa fa-chevron-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
</div>


