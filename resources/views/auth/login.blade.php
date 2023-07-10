<x-app-layout>
    
    <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li class="active">Login Register</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="{{ route('login') }}" method="POST" >
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Đăng nhập tài khoản</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email*</label>
                                            <input name="email" class="mb-0" type="email" placeholder="Email" :value="old('email')" required autofocus>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Mật khẩu</label>
                                            <input name="password" class="mb-0" type="password" placeholder="Mật khẩu" required autocomplete="current-password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input name="remember" type="checkbox" id="remember_me">
                                                <label for="remember_me">Ghi nhớ</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="register-button mt-0">Đăng nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                <div class="login-form">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-8">
                            <div class="slider-area pt-sm-30 pt-xs-30">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-1">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                            <h2>Chamcham Galaxy S9 | S9+</h2>
                                            <h3>Starting at <span>$1209.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="{{ route('register') }}">Đăng kí ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-02 bg-2">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                            <h2>Work Desk Surface Studio 2018</h2>
                                            <h3>Starting at <span>$824.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="{{ route('register') }}">Đăng kí ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-3">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                            <h2>Phantom 4 Pro+ Obsidian</h2>
                                            <h3>Starting at <span>$1849.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="{{ route('register') }}">Đăng kí ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                </div>
                            </div>
                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>