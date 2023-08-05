<div>
    <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
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
                        <div class="col-lg-9 order-1 order-lg-2">
                            <!-- Begin Li's Banner Area -->
                            <div class="single-banner shop-page-banner">
                                <a href="#">
                                    <img src="{{ asset('images/bg-banner/2.jpg') }}" alt="Li's Static Banner">
                                </a>
                            </div>
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
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
                                        <span>Showing 1 to 9 of {{$products->total()}}</span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->

                                <div class="product-select-box">
                                    <div class="product-short">
                                        <div class="hb-menu">
                                   <nav>
                                       <ul>
                                           <li class="dropdown-holder"><a>Sort By</a>
                                               <ul class="hb-dropdown">
                                                   <li><a class="{{$orderBy == 'Default Sorting' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Default Sorting')">Default Sorting</a>
                                                   </li>
                                                   <li><a class="{{$orderBy == 'Price: Low to High' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">Price: Low to High</a>
                                                   </li>
                                                   <li><a class="{{$orderBy == 'Price: High to Low' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">Price: High to Low</a>
                                                   </li>
                                                   <li><a class="{{$orderBy == 'Sort by Newness' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Sort by Newness')">Sort by Newness</a>
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
                                                                        <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addCart') }}" data-product-code="{{ $item->product_code }}">Add to cart</a>
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
                                                                        Add to cart
                                                                    </a>
                                                                    </form>
                                                                </li>
                                                                <form action="{{ route('Shop.addWishlist') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_code" value="{{ $item->product_code }}">
                                                                    <!-- Kiểm tra xem sản phẩm đã tồn tại trong Wishlist hay không -->
                                                                    <li class="wishlist">
                                                                        <a class="links-details @if($item->is_favorite) yellow-heart @endif" onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('Shop.addWishlist') }}" data-product-code="{{ $item->product_code }}">
                                                                            <i class="fa fa-heart-o"></i>Add to wishlist
                                                                        </a>
                                                                    </li>
                                                                </form>
                                                                <li class="wishlist"><a href="{{ route('product.details', ['product_code' => $item->product_code]) }}"><i class="fa fa-eye"></i>Product details</a></li>
                                                                
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
                                                <p>Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} items</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="{{ $products->previousPageUrl() }}" class="Previous"><i class="fa fa-chevron-left"></i> Back</a></li>
                                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                        <li class="{{ $products->currentPage() == $page ? 'active' : '' }}"><a href="{{ $url }}">{{ $page }}</a></li>
                                                    @endforeach
                                                    <li><a href="{{ $products->nextPageUrl() }}" class="Next"> Next <i class="fa fa-chevron-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                                <div class="sidebar-title">
                                    <h2>Laptop</h2>
                                </div>
                                <!-- category-sub-menu start -->
                                <div class="category-sub-menu">
                                    <ul>
                                        <li class="has-sub"><a href="# ">Prime Video</a>
                                            <ul>
                                                <li><a href="#">All Videos</a></li>
                                                <li><a href="#">Blouses</a></li>
                                                <li><a href="#">Evening Dresses</a></li>
                                                <li><a href="#">Summer Dresses</a></li>
                                                <li><a href="#">T-Rent or Buy</a></li>
                                                <li><a href="#">Your Watchlist</a></li>
                                                <li><a href="#">Watch Anywhere</a></li>
                                                <li><a href="#">Getting Started</a></li>  
                                            </ul>
                                        </li>
                                        <li class="has-sub"><a href="#">Computer</a>
                                            <ul>
                                                <li><a href="#">TV & Video</a></li>
                                                <li><a href="#">Audio & Theater</a></li>
                                                <li><a href="#">Camera, Photo</a></li>
                                                <li><a href="#">Cell Phones</a></li>
                                                <li><a href="#">Headphones</a></li>
                                                <li><a href="#">Video Games</a></li>
                                                <li><a href="#">Wireless Speakers</a></li> 
                                            </ul>
                                        </li>
                                        <li class="has-sub"><a href="#">Electronics</a>
                                            <ul>
                                                <li><a href="#">Amazon Home</a></li>
                                                <li><a href="#">Kitchen & Dining</a></li>
                                                <li><a href="#">Bed & Bath</a></li>
                                                <li><a href="#">Appliances</a></li>    
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box">
                                <div class="sidebar-title">
                                    <h2>Filter By</h2>
                                </div>
                                <!-- btn-clear-all start -->
                                <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                                <!-- btn-clear-all end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area">
                                    <h5 class="filter-sub-titel">Brand</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-categori"><a href="#">Prime Video (13)</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="#">Computers (12)</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="#">Electronics (11)</a></li>
                                            </ul>
                                        </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Categories</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-categori"><a href="#">Graphic Corner (10)</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="#"> Studio Design (6)</a></li>
                                            </ul>
                                        </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Size</h5>
                                    <div class="size-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-size"><a href="#">S (3)</a></li>
                                                <li><input type="checkbox" name="product-size"><a href="#">M (3)</a></li>
                                                <li><input type="checkbox" name="product-size"><a href="#">L (3)</a></li>
                                                <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Color</h5>
                                    <div class="color-categoriy">
                                        <form action="#">
                                            <ul>
                                                <li><span class="white"></span><a href="#">White (1)</a></li>
                                                <li><span class="black"></span><a href="#">Black (1)</a></li>
                                                <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                                <li><span class="Blue"></span><a href="#">Blue  (2) </a></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                                    <h5 class="filter-sub-titel">Dimension</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-categori"><a href="#">40x60cm (6)</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="#">60x90cm (6)</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="#">80x120cm (6)</a></li>
                                            </ul>
                                        </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!-- category-sub-menu start -->
                            <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                                <div class="sidebar-title">
                                    <h2>Laptop</h2>
                                </div>
                                <div class="category-tags">
                                    <ul>
                                        <li><a href="# ">Devita</a></li>
                                        <li><a href="# ">Cameras</a></li>
                                        <li><a href="# ">Sony</a></li>
                                        <li><a href="# ">Computer</a></li>
                                        <li><a href="# ">Big Sale</a></li>
                                        <li><a href="# ">Accessories</a></li>
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
</div>


