<div>
    <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li class="active">Chi tiết</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{ asset('storage/' .$product->image) }}" data-gall="myGallery">
                                            <img src="{{ asset('storage/' .$product->image) }}" alt="product image">
                                        </a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{ $product->name }}</h2>
                                    <span class="product-details-ref">{{ $product->brand }}</span>
                        
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">
                                            {{ number_format($product->price, 0, ",", ".") }} Vnđ
                                        </span>
                                    </div>
                                    
                                    <div class="single-add-to-cart">
                                        <form action="{{route('Cart.add')}}" method="POST" class="cart-quantity">
                                            @csrf
                                            <input type="hidden" name="product_code" value="{{$product->product_code}}">
                                            <input type="hidden" name="quantity" id="quantity">
                                            <div class="quantity">
                                                <label>Số lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input name="quantity" class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Thêm giỏ hàng</button>
                                        </form>
                                    </div>
                                   
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p> Bảo mật dữ liệu </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <p> Giao hàng nhanh chóng </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>
                                                    <p> Hoàn trả khi gặp lỗi </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Chi tiết</span></a></li>
                                   
                                   <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span>{{ $product->description }}</span>
                            </div>
                        </div>
                        
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                    
                                    @foreach($review as $review)
                                        <div class="comment-author-infos pt-25">
                                            <span>Tên</span>
                                            <em>{{ $review->name }}</em>
                                        </div>
                                        <div class="comment-details">
                                            <h4 class="title-block">Đánh giá</h4>
                                            <p>{{ $review->review }}</p>
                                        </div>
                                        <hr> <!-- Thêm dòng ngăn cách giữa các đánh giá -->
                                    @endforeach
                                    
                                    <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết đánh giá</a>
                                    </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Đánh giá sản phẩm</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="{{ asset('storage/' .$product->image) }}" alt="Li's Product">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name">{{ $product->name }}</p>
                                                                   <p>
                                                                       <span>{{ $product->description }}</span>
                                                                   </p>
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Đánh giá của bạn</h3>
                                                                        <form method="post" action="{{route('review')}}">
                                                                             @csrf
                                                                             <input type="hidden" name="product_code" value="{{$product->product_code}}">
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Viết đánh giá</label>
                                                                                <textarea id="feedback" name="review" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <p class="feedback-form-author">
                                                                                    <label for="author">Tên<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="author" name="name" value="" size="30" aria-required="true" type="text">
                                                                                </p>
                                                                                <p class="feedback-form-author feedback-form-email">
                                                                                    <label for="email">Email<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                                    <span class="required"><sub>*</sub>Trường bắt buộc</span>
                                                                                </p>
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Hủy</a>
                                                                                    <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('review') }}" >Xác nhận</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>15 sản phẩm khác cùng danh mục:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($rproducts as $item)
                                    <div class="col-lg-12">
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
                                                            <a href="">{{ $item->brand }}</a>
                                                        </h5>
                                                        
                                                    </div>
                                                    <h4><a class="product_name" href="">{{ $item->name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">
                                                            {{ number_format($item->price, 0, ",", ".") }} Vnđ
                                                        </span>
                                                    </div>
                                                    
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
</div>
