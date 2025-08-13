<footer class="mt-80">
    <div class="container">
        <div class="row">
            <div class="footer-top clearfix">
                <div class="col-sm-3">
                    <div class="position-footer-left">
                        <div>
                            <h5 class="toggled title">contact info</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="contact_contant">
                                        <div class="contact_icon">
                                            <a href="#">
                                                <i class="fa-solid fa-map-marker" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="site">
                                            <div class="contact_site">Shop-02, Al Falij Street, Mohammed Bin Zayed City, Abu Dhabi.</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact_contant">
                                        <div class="contact_icon">
                                            <a href="#">
                                                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="phone">
                                            <div class="contact_site">
                                                <a href="tel:+971547165924">+971547165924</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact_contant">
                                        <div class="contact_icon">
                                            <a href="#">
                                                <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="email">
                                            <div class="contact_site"><a href="mailto:info@alkhyalcurtain.ae">info@alkhyalcurtain.ae</a></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="footer-content">
                        <h5>Information</h5>
                        <ul class="list-unstyled">
                           
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('privacyPolicy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="footer-content">
                        <h5>My Account</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{route('register_user')}}">My Account</a></li>
                            <li><a href="{{route('login')}}">Order History</a></li>
                            <li><a href="{{route('wishlist.page')}}">Wish List</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="position-footer-right text-center">
                        <div>
                            <div class="footer_aboutus"><a href="#"><img alt="" src="{{asset('assets/front/image/catalog/logo.png')}}" /></a></div>
                            <div class="social-follow">
                                <a href="https://www.facebook.com/people/Al-Khyal-Curtains/61563588440939/"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/alkhyal_curtains/#"><i class="fa-brands fa-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>

                        <div class="news">
                            <div class="newsletterblock">
                                <div class="newsletter-form block-content">
                                    <div class="news-info">
                                        <div class="news-dec">
                                            <div class="title-text">
                                                <h4>SUBSCRIBE NEWSLETTER</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="frmnewsletter-0" action="{{ route('subscribe') }}" method="post">
                                        @csrf
                                        <div class="subscribe-form">
                                            <input type="email" name="newsletter_usr_email" id="newsletter_usr_email" placeholder="Enter e-mail here..." class="form-control input-lg inputNew txtemail" required />
                                            <button type="submit" class="subscribe-btn"><i class="icon-plane-4" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="newsletter-message msg-0"></div>
                                    </form>
                                    @if (session('message'))
                                    <script>
                                        setTimeout(function() {
                                            let msg = document.getElementById('msg');
                                            msg.style.display = 'none';
                                        }, 9000);
                                    </script>
                                    @endif

                                    <div id="msg">
                                        @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="footer-powered-bottom">
                <p class="powered">Powered By <a href="https://metadigitalmarketing.ae/">MetaDigital</a> &copy; <script>
                        document.write(new Date().getFullYear());
                    </script>
                </p>
                <div class="position-footer-bottom">
                    <div>
                        <div class="payment-link"><img alt="" src="{{asset('assets/front/image/catalog/payment.png')}}" /></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- top scroll -->
<a href="#" class="scrollToTop back-to-top" data-toggle="tooltip" title=""><i class="fa fa-angle-up"></i></a>

<div id="quickViewModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <a href="javascript:void(0);" class="quickview-btn"><i class="icon-close"></i></a>
            <div class="modal-body">
                <div class="row">
                    <div class="quickview-container">
                        <div class="row pro-detail">
                            <div class="col-sm-5 quick-product-left">
                                <div class="thumbnails">
                                    <div class="pro-image">
                                        <img src="" id="quick-main-image" class="img-thumbnail mb-3">
                                    </div>
                                    <div id="quick-carousel" class="slick-theme clearfix">
                                        <div class="slick-list draggable">
                                            <div class="slick-track"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="quick-product-right">
                                    <h3 id="quick-title"></h3>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li><span class="disc">Product Code:</span> <span id="quick-product-id"></span></li>
                                        <li><span class="disc">Availability:</span> <span id="quick-stock"></span> (<span id="stock"></span>)</li>
                                    </ul>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li>
                                            <h2><span id="price-new"></span></h2>
                                        </li>
                                        <li id="quick-description"></li>
                                    </ul>
                                    <br>
                                    <div id="product">
                                        <hr>
                                        <h3></h3>
                                        <div>
                                            <form id="form-product-quickview">
                                                <div class="clearfix mb-3">
                                                    <div class="product-btn-quantity">
                                                        <div class="minus-plus">
                                                            <button type="button" class="minus"><i class="fa fa-minus"></i></button>
                                                            <input type="text" name="quantity" value="1" size="2" class="form-control">
                                                            <button type="button" class="plus"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div id="error-quantity" class="form-text"></div>
                                                    <input type="hidden" name="product_id" id="input-product-id">
                                                    <button type="submit" id="button-cart-quick" class="btn btn-primary btn-lg btn-block addcart">Add to Cart</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
$promotion = App\Models\Promotion::first();
@endphp

@if ($promotion && $promotion->is_active)
<div id="promoOverlay" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.7); display: flex; align-items: center; justify-content: center; z-index: 9999;">
    <div style="position: relative; display: inline-block;">
        <!-- Close Button -->
        <button id="closePromo" style="position: absolute; top: -15px; right: -15px; background: red; color: white; border: none; border-radius: 50%; width: 30px; height: 30px; font-size: 20px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
            ×
        </button>

        <!-- Agar Video hai to Video Show hoga -->
        @if ($promotion->video_path)
        <a href="{{ $promotion->redirect_link ?? '#' }}">
            <video id="promoMedia" width="500px" style="border-radius: 10px; box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);" autoplay muted>
                <source src="{{ asset('storage/' . $promotion->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </a>
        @elseif ($promotion->image)
        <!-- Agar Image hai to Image Show hogi -->
        <a href="{{ $promotion->redirect_link ?? '#' }}">
            <img id="promoMedia" src="{{ asset('storage/' . $promotion->image) }}" width="400px" style="border-radius: 10px; box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);">
        </a>
        @endif
    </div>
</div>

<script>
    document.getElementById("closePromo").addEventListener("click", function() {
        document.getElementById("promoOverlay").style.display = "none"; // Hide the overlay on close
    });
</script>
@endif
