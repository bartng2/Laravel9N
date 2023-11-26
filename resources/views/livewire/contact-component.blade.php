<div>
    <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
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
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li class="active">Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
   <!-- Begin Contact Main Page Area -->
            <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container mb-60">
                    <div id="google-map"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">Liên hệ với chúng tôi</h3>
                                <p class="contact-page-message mb-25">Bản quyền trang web thuộc về Pro7KTeam. Mọi sự sao chép hoặc tham khảo đều cần có sự đồng thuận của chúng tôi. | Liên hệ ngay: Nguyễn Xuân Thái | Email: nam.n1352@gmail.com Để biết thêm chi tiết</p>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-fax"></i>Địa chỉ</h4>
                                    <p> 68 Triều Khúc, Thanh Xuân, Hà Nội, Việt Nam</p>
                                </div>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-phone"></i>Số điện thoại</h4>
                                    <p>Mobile: (+84) 368 009 154</p>
                                </div>
                                <div class="single-contact-block last-child">
                                    <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                    <p>thaixuannguyen002@gmail.com</p>
                                    <p>nam.n1352@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Gửi cho chúng tôi tin nhắn</h3>
                                <div class="contact-form">
                                    <form  id="contact-form" action="{{route('message')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên <span class="required">*</span></label>
                                            <input type="text" name="name" id="customername" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" name="email" id="customerEmail" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại</label>
                                            <input type="text" name="phone" id="contactSubject">
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>Tin nhắn</label>
                                            <textarea name="message" id="contactMessage" ></textarea>
                                        </div>
                                        <div class="feedback-btn pb-15">
                                            <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('message') }}" >Gửi</a>
                                        </div>
                                    </form>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Main Page Area End Here -->
</div>
