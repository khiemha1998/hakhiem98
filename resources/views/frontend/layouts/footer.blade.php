<footer>
    <div class="footer-top section-pb section-pt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Thông tin liên hệ</h6>

                        <div class="footer-addres">
                            <div class="widget-content mb--20">
                                <p>{{ $setting->address }}</p>
                                <p>Phone: <a href="tel:">{{ $setting->phone }}</a></p>
                                <p>Hotline: <a href="tel:">{{ $setting->hotline }}</a></p>
                                <p>Email: <a href="tel:">{{ $setting->email }}</a></p>
                            </div>
                        </div>

                        <ul class="social-icons">
                            <li>
                                <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Thông tin</h6>
                        <ul class="footer-list">
                            <li><a href="{{route('shop.index')}}">Trang chủ</a></li>
                            <li><a href="{{route('shop.products')}}">Sản Phẩm</a></li>
                            <li><a href="{{route('shop.blog')}}">Blog</a></li>
                            <li><a href="{{route('shop.contact')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Extras</h6>
                        <ul class="footer-list">

                            <li><a href="#">Concord History</a></li>
                            <li><a href="#">Client Feed</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Quick Contact</a></li>
                            <li><a href="blog.html">Blog Pages</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Get the app</h6>
                        <p>GreenLife App is now available on Google Play & App Store. Get it now.</p>
                        <ul class="footer-list">
                            <li><img src="/frontend/images/brand/img-googleplay.jpg" alt=""></li>
                            <li><img src="/frontend/images/brand/img-appstore.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copy-left-text">
                        <p>Copyright &copy; <a href="#">Ruiz</a> 2019. All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copy-right-image">
                        <img src="/frontend/images/icon/img-payment.png" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
