<div>
    <!-- Begin Slider With Banner Area -->
            <div class="slider-with-banner">
    <div class="container-fluid"> <!-- Sử dụng container-fluid để tăng chiều rộng -->
        <div class="row justify-content-center align-items-center">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8"> <!-- Tăng chiều rộng thành 10 -->
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-1">
                                        <div class="slider-progress"></div>
                                        
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-02 bg-2">
                                        <div class="slider-progress"></div>
                                        
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-3">
                                        <div class="slider-progress"></div>
                                        
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Slider With Banner Area End Here -->
            <!-- Begin Static Top Area -->
            <div class="static-top-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="static-top-content mt-sm-30">
                                Quà tặng đặc biệt: Quà tặng mỗi ngày cuối tuần - Mã giảm giá mới "
                                <span> Pro7KTeam "</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Top Area End Here -->
            <!-- product-area start -->
            <div class="product-area pt-55 pb-25 pt-xs-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm mới</span></a></li>
                                   
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($nproducts as $item)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('product.details', ['product_code' => $item->product_code]) }}">
                                                    <img src="{{ asset('storage/'.$item->image) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $item->brand }}</a>
                                                        </h5>
                                                        
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
                        
                        
                    </div>
                </div>
            </div>
            
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Laptop</span>
                                </h2>
                                
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($laptop as $item)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                               <a href="{{ route('product.details', ['product_code' => $item->product_code]) }}">   
                                                    <img src="{{ asset('storage/'.$item->image) }}" alt="Li's Product Image">
                                                </a>
                                                
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$item->brand}}</a>
                                                        </h5>
                                                        
                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('product.details', ['product_code' => $item->product_code]) }}">{{$item->name}}</a></h4>
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Li's TV & Audio Product Area -->
            <section class="product-area li-laptop-product li-tv-audio-product pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Điện thoại, Tablet</span>
                                </h2>
                                
                            </div>
                             <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($phone as $item)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                               <a href="{{ route('product.details', ['product_code' => $item->product_code]) }}">   
                                                    <img src="{{ asset('storage/'.$item->image) }}" alt="Li's Product Image">
                                                </a>
                                                
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$item->brand}}</a>
                                                        </h5>
                                                        
                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('product.details', ['product_code' => $item->product_code]) }}">{{$item->name}}</a></h4>
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's TV & Audio Product Area End Here -->
            <!-- Begin Li's Static Home Area -->
            <div class="li-static-home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Static Home Image Area -->
                            <div class="li-static-home-image"></div>
                            <!-- Li's Static Home Image Area End Here -->
                            <!-- Begin Li's Static Home Content Area -->
                            
                            <!-- Li's Static Home Content Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Static Home Area End Here -->
            <!-- Begin Group Featured Product Area -->
            <div class="group-featured-product pt-60 pb-40 pb-xs-25">
                
            </div>
            <!-- Group Featured Product Area End Here -->
</div>
