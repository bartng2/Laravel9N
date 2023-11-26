<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-431:41-->
<head>
       <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home Version Four || limupa - Digital Products Store ECommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
         <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{ asset('css/fontawesome-stars.css') }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{ asset('css/venobox.css') }}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{ asset('css/helper.css') }}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <!-- Modernizr js -->

        
        <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
        @livewireStyles
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header class="li-header-4">
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Liên hệ:</span><a href="#">(+84) 368 009 154</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                            <div class="ht-setting-trigger"><span>Tài khoản</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    @auth
                                                    <li>{{ Auth::user()->name }}  
                                                        <form action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                            <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('logout') }}">Đăng xuất</a></li>
                                                        </form>
                                                    @else
                                                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                                    <li><a href="{{ route('register') }}">Đăng kí</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                        @auth
                                            @if(Auth::user()->utype == 'ADM')
                                        <li>
                                            <span class="language-selector-wrapper"><a href="{{ route('admin.dashboard') }}">Admin</a></span>
                                        </li>
                                        @else
                                            <div class="ht-language-trigger"><span></span></div>
                                            @endif
                                            @endif
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="/">
                                        <img src="{{ asset('images/menu/logo/2.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="{{route('search')}}" method="GET" class="hm-searchbox">
                                    @csrf
                                    
                                    <input type="text" name="query" placeholder="Nhập khóa tìm kiếm của bạn ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        @livewire('wishlist-icon-component')
                                        <!-- Header Middle Wishlist Area End Here -->
                                       @livewire('cart-icon-component')
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                                
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                               <!-- Begin Header Bottom Menu Area -->
                               <div class="hb-menu">
                                   <nav>
                                       <ul>
                                           <li class="dropdown-holder"><a href="/">Home</a>
                                               
                                           </li>
                                           <li class="megamenu-holder"><a href="#">Sản phẩm</a>
                                               <ul class="megamenu hb-megamenu">
                                                   <li><a href="#">Bố cục trang cửa hàng</a>
                                                       <ul>
                                                           <li><a href="{{ route('shop') }}">Điện thoại & Tablet</a></li>
                                                           <li><a href="{{route('shop2')}}">Laptop</a></li>
                                                       </ul>
                                                   </li>
                                               </ul>
                                           </li>
                                           
                                           <li class="megamenu-static-holder"><a href="index.html">Liên kết</a>
                                               <ul class="megamenu hb-megamenu">
                                    
                                                        <li><a href="#">Lựa chọn</a>
                                                       <ul>
                                                            <li><a href="{{route('login')}}">Tài khoản</a></li>
                                                            
                                                           <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li> 
                                                           <li><a href="{{route('shop.wishlist')}}">Yêu thích</a></li> 
                                                       </ul>
                                                        
                                               </ul>
                                           </li>
                                           <li class="dropdown-holder"><a href="/">Về chúng tôi</a>
                                               <ul class="hb-dropdown">
                                                   <li><a href="{{route('blog')}}">Blog</a>
                                                   </li>
                                                   <li><a href="{{route('contact')}}">Liên hệ</a>
                                                   </li>
                                               </ul>
                                           </li>
                                       </ul>
                                   </nav>
                               </div>
                               <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            {{ $slot }}
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('images/shipping-icon/1.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Giao hàng miễn phí</h2>
                                            <p>Và trả lại miễn phí. Xem thanh toán để biết ngày giao hàng.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('images/shipping-icon/2.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Thanh toán an toàn</h2>
                                            <p>Thanh toán bằng các phương thức thanh toán an toàn và phổ biến nhất thế giới.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('images/shipping-icon/3.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Mua sắm với sự tự tin</h2>
                                            <p>Bảo vệ người mua của chúng tôi bao gồm việc mua hàng của bạn từ nhấp chuột đến giao hàng.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('images/shipping-icon/4.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Trung tâm trợ giúp 24/7</h2>
                                            <p>Có một câu hỏi? Gọi cho Chuyên gia hoặc trò chuyện trực tuyến.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <a href="/">
                                        <img src="{{ asset('images/menu/logo/1.jpg') }}" alt="Footer Logo">
                                        </a>
                                        <p class="info">
                                            Bản quyền trang web thuộc về Pro7KTeam. Mọi sự sao chép hoặc tham khảo đều cần có sự đồng thuận của chúng tôi. |
                                            Liên hệ ngay: Nguyễn Xuân Thái |
                                            Email: nam.n1352@gmail.com
                                            Để biết thêm chi tiết
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Địa chỉ: </span>
                                            68 Triều Khúc, Thanh Xuân, Hà Nội, Việt Nam
                                        </li>
                                        <li>
                                            <span>Điện thoại: </span>
                                            <a href="#">(+84) 368 009 154</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://info@yourdomain.com">thaixuannguyen002@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Liên kết nhanh</h3>
                                        <ul>
                                            <li><a href="{{route('login')}}">Tài khoản</a></li>
                                            <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li>
                                            <li><a href="{{route('shop.wishlist')}}">Yêu thích</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Xem thêm</h3>
                                        <ul>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Theo dõi chúng tôi</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="rss">
                                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" data-toggle="tooltip" target="_blank" title="RSS">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" data-toggle="tooltip" target="_blank" title="Google +">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    <div class="footer-newsletter">
                                        <h4>Đăng ký nhận bản tin</h4>
                                        <form action="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Nhập email" />
                                                <button  class="btn" id="mc-submit">Đăng kí</button>
                                              </div>
                                           </div>
                                        </form>
                                    </div>
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Footer Links Area -->
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="/">Trang chủ</a></li>
                                        <li><a href="{{route('login')}}">Tài khoản</a></li>
                                        <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li>
                                        <li><a href="{{route('shop.wishlist')}}">Yêu thích</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Liên hệ</a></li>
                                        
                                    </ul>
                                </div>
                                <!-- Footer Links Area End Here -->
                                <!-- Begin Footer Payment Area -->
                                <div class="copyright text-center">
                                    <a href="#">
                                        <img src="{{asset('images/payment/1.png')}}" alt="">
                                    </a>
                                </div>
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                <div class="copyright text-center pt-25">
                                    <span><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Design by @bartng2 from Pro7KTeam</a></span>
                                </div>
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <!-- This script got from frontendfreecode.com -->


        <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Ajax Mail js -->
        <script src="{{ asset('js/ajax-mail.js') }}"></script>
        <!-- Meanmenu js -->
        <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
        <!-- Wow.min js -->
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <!-- Slick Carousel js -->
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <!-- Magnific popup js -->
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Isotope js -->
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <!-- Imagesloaded js -->
        <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- Mixitup js -->
        <script src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
        <!-- Countdown -->
        <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <!-- Counterup -->
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <!-- Waypoints -->
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <!-- Barrating -->
        <script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
        <!-- Jquery-ui -->
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <!-- Venobox -->
        <script src="{{ asset('js/venobox.min.js') }}"></script>
        <!-- Nice Select js -->
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <!-- ScrollUp js -->
        <script src="{{ asset('js/scrollUp.min.js') }}"></script>
        <!-- Main/Activator js -->
        <script src="{{ asset('js/main.js') }}"></script>
        <!-- Google Map -->
        <script src="{{asset('https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE')}}"></script>
        <script>
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 12,
                    scrollwheel: false,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(21.028511, 105.854444), // Hanoi, Vietnam
                    // How you would like to style the map. 
                    // This is where you would paste any style found on
                        styles: [{
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#e9e9e9"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 29
                                    },
                                    {
                                        "weight": 0.2
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 18
                                    }
                                ]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#dedede"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.text.stroke",
                                "stylers": [{
                                        "visibility": "on"
                                    },
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                        "saturation": 36
                                    },
                                    {
                                        "color": "#333333"
                                    },
                                    {
                                        "lightness": 40
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.icon",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "geometry",
                                "stylers": [{
                                        "color": "#f2f2f2"
                                    },
                                    {
                                        "lightness": 19
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 17
                                    },
                                    {
                                        "weight": 1.2
                                    }
                                ]
                            }
                        ]
                    };

                    // Get the HTML DOM element that will contain your map 
                    // We are using a div with id="map" seen below in the <body>
                    var mapElement = document.getElementById('google-map');

                    // Create the Google Map using our element and options defined above
                    var map = new google.maps.Map(mapElement, mapOptions);

                    // Let's also add a marker while we're at it
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(21.028511, 105.854444),
                        map: map,
                        title: 'Hanoi, Vietnam',
                        animation: google.maps.Animation.BOUNCE
                    });
                }
            </script>
        @livewireScripts
    </body>

<!-- index-431:47-->
</html>
