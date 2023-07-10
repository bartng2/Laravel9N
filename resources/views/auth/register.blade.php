<x-app-layout>
    
    <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <!-- Login Form s-->
                            <form action="#" >
                                <div class="login-form">
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
                                                <a class="links" href="{{ route('login') }}">Shopping Now</a>
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
                                                <a class="links" href="{{ route('login') }}">Shopping Now</a>
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
                                                <a class="links" href="{{ route('login') }}">Shopping Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                </div>
                            </div>
                        </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Đăng kí tài khoản</h4>
                                    <div class="row">
                                        <div class="col-md-12 mb-20">
                                            <label>Tên người dùng</label>
                                            <input name="name" class="mb-0" type="text" placeholder="Tên người dùng" :value="old('name')" required autofocus autocomplete="name">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email</label>
                                            <input name="email" class="mb-0" type="email" placeholder="Email" :value="old('email')">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Mật khẩu*</label>
                                            <input name="password" class="mb-0" type="password" placeholder="Mật khẩu" required autocomplete="new-password">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Xác nhận mật khẩu</label>
                                            <input name="password_confirmation" class="mb-0" type="password" placeholder="Xác nhận mật khẩu" required autocomplete="new-password">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="register-button mt-0">Đăng kí</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</x-app-layout>